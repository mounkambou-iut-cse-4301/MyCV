<?php

namespace App\Http\Controllers;

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
                     return back()->with('fail','Mot de passe incorrect');
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
             if($req->debut_date >= $req->fin_date){
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


      //Education et Formation

    function education_formation( Request $req){
        if($req->isMethod('get')){
            $info= EducationFormation::where('utilisateur_id',session('LoggedUser'))->orderBy('created_at','DESC')->get();
            
                return view('/layouts/education_formation')->with('info',$info);
            
        } else if($req->isMethod('post')){
            $req->validate([
                'qualification'=>'required',
             ]);
             if($req->debut_date >= $req->fin_date){
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
                'groupe'=>'required',
                'liste'=>'required',
             ]);
             $info= new CompetenceNumerique;
                $info->groupe=$req->groupe;
                $info->liste=$req->liste;
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
             if($req->debut_date >= $req->fin_date){
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
             if($req->debut_date >= $req->fin_date){
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



    function competence_matiere_orga(){
        return view('/layouts/competence_matiere_orga');
    }

    function competence_matiere_gestion(){
        return view('/layouts/competence_matiere_gestion');
    }
    function competence_interperso(){
        return view('/layouts/competence_interperso');
    }

    function conference_seminaire(){
        return view('/layouts/conference_seminaire');
    }
    function loisir_interet(){
        return view('/layouts/loisir_interet');
    }
    function oeuvre_creative(){
        return view('/layouts/oeuvre_creative');
    }

    function permis_conduire(){
        return view('/layouts/permis_conduire');
    }
    function prix_distinction(){
        return view('/layouts/prix_distinction');
    }

    function projet(){
        return view('/layouts/projet');
    }
    function publication(){
        return view('/layouts/publication');
    }
    function recommandation(){
        return view('/layouts/recommandation');
    }

    function reseau_adhesion(){
        return view('/layouts/reseau_adhesion');
    }


    function modifier_pass(){
        return view('/layouts/modifier_pass');
    }

}