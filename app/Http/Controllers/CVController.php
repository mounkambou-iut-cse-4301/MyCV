<?php

namespace App\Http\Controllers;
use PDF;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Utilisateur;
use App\Models\InformationPersonelle;
use App\Models\ExperienceProfessionnelle;
use App\Models\EducationFormation;
use App\Models\CompetenceLinguistique;
use App\Models\CompetenceNumerique;
use App\Models\ActiviteSocialePolitique;
use App\Models\Benevolat;
use App\Models\CompetenceOrganisation;
use App\Models\CompetenceGestion;
use App\Models\CompetenceInterpersonnelle;
use App\Models\ConferenceSeminaire;
use App\Models\LoisirInteret;
use App\Models\OeuvreCreative;
use App\Models\PrixDistinction;
use App\Models\Publication;
use App\Models\Projet;
use App\Models\Recommandation;
use App\Models\ReseauAdhesion;
use App\Models\PermisConduire;


use DB;

class CVController extends Controller
{
    function dashboard(){
        $user=Utilisateur::where('id',session('LoggedUser'))->first();
       
        return view('/layouts/dashboard');
    }

    function login(Request $req){
        if($req->isMethod('get')){
            return view('/layouts/login');
        }else if($req->isMethod('post')){
            //Valider la requette
            $req->validate([
                'email'=>'required|email',
                'password'=>'required|min:5|max:12'
             ]);

             $userInfo=Utilisateur::where('email',$req->email)->first();
             if(!$userInfo){
               return back()->with('fail','Nous ne reconnaissons pas votre adresse e-mail');
             }else{
                 if(Hash::check($req->password,$userInfo->password)){
                      $req->session()->put('LoggedUser',$userInfo->id);
                      //   dd(session('LoggedUser'));
                    
                     return redirect('/dashboard');
                 }else{
                     return back()->with('fail','Mot de pass incorrect');
                   }
                }
        }
    }

    function logout(){
        if(session()->has('LoggedUser')){
         session()->pull('LoggedUser');
         return redirect('/login');
        }
    }

    function register(Request $req ){
        if($req->isMethod('get')){
            return view('/layouts/register');
        }else if($req->isMethod('post')){
           //Valider la requette
           $req->validate([
              'name'=>'required',
              'email'=>'required|email|unique:utilisateurs',
              'password'=>'required|min:5|max:12',
              'confirm_password'=>'required|min:5|max:12'
           ]);

           if($req->password===$req->confirm_password){
              //Ajouter les data dans le database
           $user=new Utilisateur;
           $user->name=$req->name;
           $user->email=$req->email;
           $user->password= Hash::make($req->password);
           $save=$user->save();
           if($save){
              return back()->with('success','Le nouvel utilisateur a été ajouté avec succès dans la base de données');
           }else{
              return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
             }
           }else{
            return back()->with('fail',"Veillez confirmer votre mot de pass");
           }
        }
       
    }

    function info_personelle(Request $req){
        if($req->isMethod('get')){
            $info=InformationPersonelle::where('utilisateur_id',session('LoggedUser'))->first();
            if($info===null){
               $state=0;
               return view('/layouts/info_personelle')->with('state',$state);
            }else{
                $state=1;
                return view('/layouts/info_personelle')->with('info',$info)
                                                       ->with('state',$state);
            }
            
        }else if($req->isMethod('post')){
            $req->validate([
                'prenom'=>'required',
                'nom'=>'required',
                'metier'=>'required',
                'date_naissance'=>'required',
                'sexe'=>'required',
                'nationalite'=>'required',
                'email'=>'required',
                'telephone'=>'required',
                'pays'=>'required',
                'ville'=>'required',
                'localite'=>'required',
                'nom_photo'=>'max:500|mimes:jpeg,jpg,gif,svg,png| dimensions:width>=300,height>=300',
             ]);

             
             $check= InformationPersonelle::where('utilisateur_id',session('LoggedUser'))->first();
            
             if($check===null){
                $info= new InformationPersonelle;
                $info->prenom=$req->prenom;
                $info->nom=$req->nom;
                $info->titre=$req->metier;
                $info->date_naissance=$req->date_naissance;
                $info->sexe=$req->sexe;
                $info->nationalite=$req->nationalite;
                $info->numero_telephone=$req->telephone;
                $info->email=$req->email;
                $info->pays=$req->pays;
                $info->ville=$req->ville;
                $info->localite=$req->localite;
                $info->description=$req->description;
                $info->linkedin=$req->linkedin;
                $info->tweetter=$req->twitter;
                $info->facebook=$req->facebook;
                $info->instagram=$req->instagram;
                $info->youtube=$req->youtube;
                $info->site_web=$req->site_web;
                $info->code_postal=$req->code_postal;
                if($req->hasFile('nom_photo')){
                    $nom_photo=$req->file('nom_photo')->getClientOriginalName();
                    $req->file('nom_photo')->storeAs('public/images/', $nom_photo);
                    $info->nom_photo=$nom_photo;
                }
                $info->status=0;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                   return back()->with('success',"L'informations personelle a été ajoutée avec succès dans la base de données");
                }else{
                   return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                  }
             }else{
                
                 
                $update=InformationPersonelle::where('utilisateur_id',session('LoggedUser'))
                               ->update([
                                'prenom'=>$req->prenom,
                                'nom'=>$req->nom,
                                'titre'=>$req->metier,
                                'date_naissance'=>$req->date_naissance,
                                'sexe'=>$req->sexe,
                                'nationalite'=>$req->nationalite,
                                'numero_telephone'=>$req->telephone,
                                'email'=>$req->email,
                                'pays'=>$req->pays,
                                'ville'=>$req->ville,
                                'localite'=>$req->localite,
                                'description'=>$req->description,
                                'linkedin'=>$req->linkedin,
                                'tweetter'=>$req->twitter,
                                'facebook'=>$req->facebook,
                                'instagram'=>$req->instagram,
                                'youtube'=>$req->youtube,
                                'site_web'=>$req->site_web,
                                'code_postal'=>$req->code_postal,
                                ]);

                                if($req->hasFile('nom_photo')){
                                    $nom_photo=$req->file('nom_photo')->getClientOriginalName();
                                    $req->file('nom_photo')->storeAs('public/images/', $nom_photo);
                                    $update2=InformationPersonelle::where('utilisateur_id',session('LoggedUser'))
                                       ->update([
                                        'nom_photo'=>$nom_photo,
                                        ]);
                                }
                    
                if($update || $update2){
                  return back()->with('success',"L'informations personelle a été modifiée avec succès dans la base de données");
                }else{
                  return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                }
             }
        }
        
    }


    function experience_pro(Request $req){
        if($req->isMethod('get')){
            $info= ExperienceProfessionnelle::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/experience_pro')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'poste'=>'required',
             ]);
             if($req->debut_date > $req->fin_date && $req->fin_date!==null){
                return back()->with('fail',"La date du début doit être inférieure à celle de la fin");
             }
             $info= new ExperienceProfessionnelle;
                $info->poste=$req->poste;
                $info->employeur=$req->employeur;
                $info->pays=$req->pays;
                $info->localite=$req->localite;
                $info->debut_date=$req->debut_date;
                $info->fin_date=$req->fin_date;
                $info->description=$req->description;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"L'experience professionnelle a été ajoutée avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
        
    }
    function delete_exp_pro($id){
       
        $delete=ExperienceProfessionnelle::where('id',$id)->delete();
        return redirect()->back();
    }

    // function update_exp_pro($id){
       
    //     $edit=ExperienceProfessionnelle::find($id);
    //     $update=1;
        
    //     return view('/layouts/experience_pro')->with('edit',$edit);
    // }


      //Education et Formation

    function education_formation( Request $req){
        if($req->isMethod('get')){
            $info= EducationFormation::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/education_formation')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'qualification'=>'required',
             ]);
             if($req->debut_date > $req->fin_date && $req->fin_date!==null){
                return back()->with('fail',"La date du début doit être inférieure à celle de la fin");
             }
             $info= new EducationFormation;
                $info->qualification=$req->qualification;
                $info->organisme=$req->organisme;
                $info->pays=$req->pays;
                $info->site_web=$req->site_web;
                $info->adresse=$req->adresse;
                $info->debut_date=$req->debut_date;
                $info->fin_date=$req->fin_date;
                $info->code_postal=$req->code_postal;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }
    function delete_edu_form($id){
       
        $delete=EducationFormation::where('id',$id)->delete();
        return redirect()->back();
    }



    //Competence Linguistique

    function competence_ling( Request $req){
        if($req->isMethod('get')){
            $info= CompetenceLinguistique::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/competence_ling')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'langue'=>'required',
                'niveau'=>'required',
             ]);
             $info= new CompetenceLinguistique;
                $info->langue=$req->langue;
                $info->niveau=$req->niveau;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }

    function delete_comp_ling($id){
       
        $delete=CompetenceLinguistique::where('id',$id)->delete();
        return redirect()->back();
    }


    //Competence Numerique

    function competence_num(Request $req){
        if($req->isMethod('get')){
            $info= CompetenceNumerique::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/competence_num')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'technologie'=>'required',
                'niveau'=>'required',
             ]);
             $info= new CompetenceNumerique;
                $info->technologie=$req->technologie;
                $info->niveau=(int) $req->niveau;
            
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }

    function delete_comp_num($id){
       
        $delete=CompetenceNumerique::where('id',$id)->delete();
        return redirect()->back();
    }


    //ActiviteSociale Politique
    function activite_sociale_politique(Request $req){
        if($req->isMethod('get')){
            $info= ActiviteSocialePolitique::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/activite_sociale_politique')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'titre'=>'required',
             ]);
             if($req->debut_date > $req->fin_date && $req->fin_date!==null){
                return back()->with('fail',"La date du début doit être inférieure à celle de la fin");
             }
             $info= new ActiviteSocialePolitique;
                $info->titre=$req->titre;
                $info->lieu=$req->lieu;
                $info->debut_date=$req->debut_date;
                $info->fin_date=$req->fin_date;
                $info->lien=$req->lien;
                $info->description=$req->description;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }

    function delete_act_soc_pol($id){
       
        $delete=ActiviteSocialePolitique::where('id',$id)->delete();
        return redirect()->back();
    }

    //Benevolat

    function benevolat(Request $req){
        if($req->isMethod('get')){
            $info= Benevolat::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/benevolat')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'titre'=>'required',
             ]);
             if($req->debut_date > $req->fin_date && $req->fin_date!==null){
                return back()->with('fail',"La date du début doit être inférieure à celle de la fin");
             }
             $info= new Benevolat;
                $info->titre=$req->titre;
                $info->lieu=$req->lieu;
                $info->debut_date=$req->debut_date;
                $info->fin_date=$req->fin_date;
                $info->lien=$req->lien;
                $info->description=$req->description;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }

    function delete_benevolat($id){
       
        $delete=Benevolat::where('id',$id)->delete();
        return redirect()->back();
    }

  //Competence Organisation

    function competence_matiere_orga(Request $req){
        if($req->isMethod('get')){
            $info= CompetenceOrganisation::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/competence_matiere_orga')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'titre'=>'required',
             ]);
             if($req->debut_date > $req->fin_date && $req->fin_date!==null){
                return back()->with('fail',"La date du début doit être inférieure à celle de la fin");
             }
             $info= new CompetenceOrganisation;
                $info->titre=$req->titre;
                $info->lieu=$req->lieu;
                $info->debut_date=$req->debut_date;
                $info->fin_date=$req->fin_date;
                $info->lien=$req->lien;
                $info->description=$req->description;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }

    function delete_comp_organisation($id){
       
        $delete=CompetenceOrganisation::where('id',$id)->delete();
        return redirect()->back();
    }

    //Competence Gestion
    function competence_matiere_gestion(Request $req){
        if($req->isMethod('get')){
            $info= CompetenceGestion::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/competence_matiere_gestion')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'titre'=>'required',
             ]);
             if($req->debut_date > $req->fin_date && $req->fin_date!==null){
                return back()->with('fail',"La date du début doit être inférieure à celle de la fin");
             }
             $info= new CompetenceGestion;
                $info->titre=$req->titre;
                $info->lieu=$req->lieu;
                $info->debut_date=$req->debut_date;
                $info->fin_date=$req->fin_date;
                $info->lien=$req->lien;
                $info->description=$req->description;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }

    function delete_comp_gestion($id){
       
        $delete=CompetenceGestion::where('id',$id)->delete();
        return redirect()->back();
    }


    //Competence Interpersonnelle

    function competence_interperso(Request $req){
        if($req->isMethod('get')){
            $info= CompetenceInterpersonnelle::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/competence_interperso')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'titre'=>'required',
             ]);
             if($req->debut_date > $req->fin_date && $req->fin_date!==null){
                return back()->with('fail',"La date du début doit être inférieure à celle de la fin");
             }
             $info= new CompetenceInterpersonnelle;
                $info->titre=$req->titre;
                $info->lieu=$req->lieu;
                $info->debut_date=$req->debut_date;
                $info->fin_date=$req->fin_date;
                $info->lien=$req->lien;
                $info->description=$req->description;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }

    function delete_comp_interperso($id){
       
        $delete=CompetenceInterpersonnelle::where('id',$id)->delete();
        return redirect()->back();
    }


    //Conference Seminaire
    function conference_seminaire(Request $req){
        if($req->isMethod('get')){
            $info= ConferenceSeminaire::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/conference_seminaire')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'titre'=>'required',
             ]);
             if($req->debut_date > $req->fin_date && $req->fin_date!==null){
                return back()->with('fail',"La date du début doit être inférieure à celle de la fin");
             }
             $info= new ConferenceSeminaire;
                $info->titre=$req->titre;
                $info->lieu=$req->lieu;
                $info->debut_date=$req->debut_date;
                $info->fin_date=$req->fin_date;
                $info->lien=$req->lien;
                $info->description=$req->description;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }

    function delete_conf_semi($id){
       
        $delete=ConferenceSeminaire::where('id',$id)->delete();
        return redirect()->back();
    }


    //Loisir Interet
    function loisir_interet(Request $req){
        if($req->isMethod('get')){
            $info= LoisirInteret::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/loisir_interet')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'description'=>'required',
             ]);
             $info= new LoisirInteret;
                $info->lien=$req->lien;
                $info->description=$req->description;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }

    function delete_loisir($id){
       
        $delete=LoisirInteret::where('id',$id)->delete();
        return redirect()->back();
    }  

    //OeuvreCreative
    function oeuvre_creative(Request $req){
        if($req->isMethod('get')){
            $info= OeuvreCreative::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/oeuvre_creative')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'titre'=>'required',
             ]);
             if($req->debut_date > $req->fin_date && $req->fin_date!==null){
                return back()->with('fail',"La date du début doit être inférieure à celle de la fin");
             }
             $info= new OeuvreCreative;
                $info->titre=$req->titre;
                $info->debut_date=$req->debut_date;
                $info->fin_date=$req->fin_date;
                $info->lien=$req->lien;
                $info->description=$req->description;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }

    function delete_oeuvre_creative($id){
       
        $delete=OeuvreCreative::where('id',$id)->delete();
        return redirect()->back();
    }

   //Permis Conduire
    function permis_conduire(Request $req){
        if($req->isMethod('get')){
            $info= PermisConduire::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/permis_conduire')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'permis'=>'required',
                'niveau'=>'required',
             ]);
             $check=PermisConduire::where('permis',$req->permis)
                                   ->where('niveau',$req->niveau)->first();
             
             if($check !== null){
                return back()->with('fail',"Vous avez déjà ces informations dans la base de données");

             }
             $info= new PermisConduire;
                $info->permis=$req->permis;
                $info->niveau=$req->niveau;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }

    function delete_permis_conduire($id){
       
        $delete=PermisConduire::where('id',$id)->delete();
        return redirect()->back();
    }

   
    //Prix Distinction
    function prix_distinction(Request $req){
        if($req->isMethod('get')){
            $info= PrixDistinction::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/prix_distinction')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'titre'=>'required',
             ]);
            
             $info= new PrixDistinction;
                $info->titre=$req->titre;
                $info->etablissement=$req->etablissement;
                $info->date=$req->date;
                $info->lien=$req->lien;
                $info->description=$req->description;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }

    function delete_prix_distinction($id){
       
        $delete=PrixDistinction::where('id',$id)->delete();
        return redirect()->back();
    }

    //Projet
    function projet(Request $req){
        if($req->isMethod('get')){
            $info= Projet::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/projet')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'titre'=>'required',
             ]);
             if($req->debut_date > $req->fin_date && $req->fin_date!==null){
                return back()->with('fail',"La date du début doit être inférieure à celle de la fin");
             }
             $info= new Projet;
                $info->titre=$req->titre;
                $info->debut_date=$req->debut_date;
                $info->fin_date=$req->fin_date;
                $info->lien=$req->lien;
                $info->description=$req->description;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }

    function delete_projet($id){
       
        $delete=Projet::where('id',$id)->delete();
        return redirect()->back();
    }


    //Publication
    function publication(Request $req){
        if($req->isMethod('get')){
            $info=Publication::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/publication')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'titre'=>'required',
             ]);
             if($req->debut_date > $req->fin_date && $req->fin_date!==null){
                return back()->with('fail',"La date du début doit être inférieure à celle de la fin");
             }
             $info= new Publication;
                $info->titre=$req->titre;
                $info->date=$req->date;
                $info->url=$req->url;
                $info->reference=$req->reference;
                $info->lien=$req->lien;
                $info->description=$req->description;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }

    function delete_publication($id){
       
        $delete=Publication::where('id',$id)->delete();
        return redirect()->back();
    }   


    //Recommandation
    function recommandation(Request $req){
        if($req->isMethod('get')){
            $info=Recommandation::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/recommandation')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'nom'=>'required',
             ]);
             $info= new Recommandation;
                $info->nom=$req->nom;
                $info->role=$req->role;
                $info->adresse_electronique=$req->adresse_electronique;
                $info->numero=$req->numero;
                $info->lien=$req->lien;
                $info->description=$req->description;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }

    function delete_recommandation($id){
       
        $delete=Recommandation::where('id',$id)->delete();
        return redirect()->back();
    } 

    //Reseau Adhesion
    function reseau_adhesion(Request $req){
        if($req->isMethod('get')){
            $info= ReseauAdhesion::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/reseau_adhesion')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'titre'=>'required',
             ]);
             if($req->debut_date > $req->fin_date && $req->fin_date!==null){
                return back()->with('fail',"La date du début doit être inférieure à celle de la fin");
             }
             $info= new ReseauAdhesion;
                $info->titre=$req->titre;
                $info->lieu=$req->lieu;
                $info->debut_date=$req->debut_date;
                $info->fin_date=$req->fin_date;
                $info->lien=$req->lien;
                $info->description=$req->description;
                $info->utilisateur_id=session('LoggedUser');
                $save=$info->save();
                if($save){
                    return back()->with('success',"Vos informations ont été ajoutées avec succès dans la base de données");
                 }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                   }
        }
    }

    function delete_reseau_adhesion($id){
       
        $delete=ReseauAdhesion::where('id',$id)->delete();
        return redirect()->back();
    } 



    function modifier_pass(Request $req){
        if($req->isMethod('get')){
            return view('/layouts/modifier_pass');
        }else if($req->isMethod('post')){
            $req->validate([
                'pass1'=>'required',
                'pass2'=>'required|min:5|max:12',
                'pass3'=>'required|min:5|max:12',
             ]);
             $userInfo=Utilisateur::where('id',session('LoggedUser'))->first();
             if(!(Hash::check($req->pass1,$userInfo->password))){
                return back()->with('fail','Mot de pass incorrect');
           }else{
               if($req->pass2!==$req->pass3){
                return back()->with('fail','Veuillez bien confirmez votre nouveau mot de pass');
               }else{
                $update=Utilisateur::where('id',session('LoggedUser'))
                ->update([
                 'password'=>Hash::make($req->pass2),
                ]);
                if($update){
                    return back()->with('success',"Le mot de pass a été modifié avec succès.");
                  }else{
                    return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
                  }
               }
             }
        }
    }

    function changer_image(Request $req){
        if($req->isMethod('get')){
         return view('/layouts/changer_image');
        }else if($req->isMethod('post')){
            $req->validate([
                'nom_photo'=>'required|max:500|mimes:jpeg,jpg,gif,svg,png| dimensions:width=300,height=300',
             ]);
             $nom_photo=$req->file('nom_photo')->getClientOriginalName();
            $req->file('nom_photo')->storeAs('public/images/', $nom_photo);
             $update=InformationPersonelle::where('utilisateur_id',session('LoggedUser'))
                                          ->update([
                                            'nom_photo'=>$nom_photo,
                                          ]);
               if($update){
                  return back()->with('success',"L'image' a été enregistrée avec succès dans la base de données");
                }else{
                  return back()->with('fail',"Quelque chose s'est mal passé, réessayez plus tard");
               }
        }
    }

    function cv_model_1(){
         $info_perso=InformationPersonelle::where('utilisateur_id',session('LoggedUser'))->first();
         $exp_pro=ExperienceProfessionnelle::where('utilisateur_id',session('LoggedUser'))->orderBy('debut_date','DESC')->get();
         $edu=EducationFormation::where('utilisateur_id',session('LoggedUser'))->orderBy('debut_date','DESC')->get();
         $comp_ling=CompetenceLinguistique::where('utilisateur_id',session('LoggedUser'))->get();
         $comp_num=CompetenceNumerique::where('utilisateur_id',session('LoggedUser'))->get();
         $act_social=ActiviteSocialePolitique::where('utilisateur_id',session('LoggedUser'))->get();
         $benevolat=Benevolat::where('utilisateur_id',session('LoggedUser'))->get();
         $comp_org=CompetenceOrganisation::where('utilisateur_id',session('LoggedUser'))->get();
         $comp_gestion=CompetenceGestion::where('utilisateur_id',session('LoggedUser'))->get();
         $comp_perso=CompetenceInterpersonnelle::where('utilisateur_id',session('LoggedUser'))->get();
         $conf_semi=ConferenceSeminaire::where('utilisateur_id',session('LoggedUser'))->get();
         $loisir=LoisirInteret::where('utilisateur_id',session('LoggedUser'))->get();
         $oeuvre_creative=OeuvreCreative::where('utilisateur_id',session('LoggedUser'))->get();
         $prix_dist=PrixDistinction::where('utilisateur_id',session('LoggedUser'))->get();
         $publication=Publication::where('utilisateur_id',session('LoggedUser'))->get();
         $projet=Projet::where('utilisateur_id',session('LoggedUser'))->get();
         $recmmandation=Recommandation::where('utilisateur_id',session('LoggedUser'))->get();
         $reseau_adh=ReseauAdhesion::where('utilisateur_id',session('LoggedUser'))->get();
         $permis=PermisConduire::where('utilisateur_id',session('LoggedUser'))->get();
         
        
        return view('/layouts/cv_model_1')->with('info_perso',$info_perso)
                                          ->with('exp_pro',$exp_pro)
                                          ->with('edu',$edu)
                                          ->with('act_social',$act_social)
                                          ->with('benevolat',$benevolat)
                                          ->with('comp_ling',$comp_ling)
                                          ->with('comp_num',$comp_num)
                                          ->with('comp_org',$comp_org)
                                          ->with('comp_gestion',$comp_gestion)
                                          ->with('comp_perso',$comp_perso)
                                          ->with('conf_semi',$conf_semi)
                                          ->with('loisir',$loisir)
                                          ->with('oeuvre_creative',$oeuvre_creative)
                                          ->with('prix_dist',$prix_dist)
                                          ->with('publication',$publication)
                                          ->with('projet',$projet)
                                          ->with('recmmandation',$recmmandation)
                                          ->with('reseau_adh',$reseau_adh)
                                          ->with('permis',$permis);
    }
    function cv_model_2(){
        $info_perso=InformationPersonelle::where('utilisateur_id',session('LoggedUser'))->first();
         $exp_pro=ExperienceProfessionnelle::where('utilisateur_id',session('LoggedUser'))->get();
         $edu=EducationFormation::where('utilisateur_id',session('LoggedUser'))->get();
         $comp_ling=CompetenceLinguistique::where('utilisateur_id',session('LoggedUser'))->get();
         $comp_num=CompetenceNumerique::where('utilisateur_id',session('LoggedUser'))->get();
         $act_social=ActiviteSocialePolitique::where('utilisateur_id',session('LoggedUser'))->get();
         $benevolat=Benevolat::where('utilisateur_id',session('LoggedUser'))->get();
         $comp_org=CompetenceOrganisation::where('utilisateur_id',session('LoggedUser'))->get();
         $comp_gestion=CompetenceGestion::where('utilisateur_id',session('LoggedUser'))->get();
         $comp_perso=CompetenceInterpersonnelle::where('utilisateur_id',session('LoggedUser'))->get();
         $conf_semi=ConferenceSeminaire::where('utilisateur_id',session('LoggedUser'))->get();
         $loisir=LoisirInteret::where('utilisateur_id',session('LoggedUser'))->get();
         $oeuvre_creative=OeuvreCreative::where('utilisateur_id',session('LoggedUser'))->get();
         $prix_dist=PrixDistinction::where('utilisateur_id',session('LoggedUser'))->get();
         $publication=Publication::where('utilisateur_id',session('LoggedUser'))->get();
         $projet=Projet::where('utilisateur_id',session('LoggedUser'))->get();
         $recmmandation=Recommandation::where('utilisateur_id',session('LoggedUser'))->get();
         $reseau_adh=ReseauAdhesion::where('utilisateur_id',session('LoggedUser'))->get();
         $permis=PermisConduire::where('utilisateur_id',session('LoggedUser'))->get();
        
        return view('/layouts/cv_model_2')->with('info_perso',$info_perso)
                                          ->with('exp_pro',$exp_pro)
                                          ->with('edu',$edu)
                                          ->with('act_social',$act_social)
                                          ->with('benevolat',$benevolat)
                                          ->with('comp_ling',$comp_ling)
                                          ->with('comp_num',$comp_num)
                                          ->with('comp_org',$comp_org)
                                          ->with('comp_gestion',$comp_gestion)
                                          ->with('comp_perso',$comp_perso)
                                          ->with('conf_semi',$conf_semi)
                                          ->with('loisir',$loisir)
                                          ->with('oeuvre_creative',$oeuvre_creative)
                                          ->with('prix_dist',$prix_dist)
                                          ->with('publication',$publication)
                                          ->with('projet',$projet)
                                          ->with('recmmandation',$recmmandation)
                                          ->with('reseau_adh',$reseau_adh)
                                          ->with('permis',$permis);
    }

    
}