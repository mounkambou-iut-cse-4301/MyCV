<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CVController extends Controller
{
    function dashboard(){
        return view('/layouts/dashboard');
    }

    function login(){
        return view('/layouts/login');
    }

    function register(){
        return view('/layouts/register');
    }

    function info_personelle(){
        return view('/layouts/info_personelle');
    }
    function experience_pro(){
        return view('/layouts/experience_pro');
    }
    function education_formation(){
        return view('/layouts/education_formation');
    }

    function competence_ling(){
        return view('/layouts/competence_ling');
    }
    function competence_num(){
        return view('/layouts/competence_num');
    }

    function activite_sociale_politique(){
        return view('/layouts/activite_sociale_politique');
    }
    function benevolat(){
        return view('/layouts/benevolat');
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

    function ajouter_section(Request $req){
        if($req->isMethod('post')){
            if($req->input('section')==='info_personelle'){
                return view('/layouts/info_personelle');
            }else if($req->input('section')==='experience_pro'){
                return view('/layouts/experience_pro');
            }
            else if($req->input('section')==='education_formation'){
                return view('/layouts/education_formation');
            }
            else if($req->input('section')==='competence_ling'){
                return view('/layouts/competence_ling');
            }
            else if($req->input('section')==='competence_num'){
                return view('/layouts/competence_num');
            }
            else if($req->input('section')==='activite_sociale_politique'){
                return view('/layouts/activite_sociale_politique');
            }
            else if($req->input('section')==='benevolat'){
                return view('/layouts/benevolat');
            }
            else if($req->input('section')==='competence_matiere_orga'){
                return view('/layouts/competence_matiere_orga');
            }
            else if($req->input('section')==='competence_matiere_gestion'){
                return view('/layouts/competence_matiere_gestion');
            }
            else if($req->input('section')==='competence_interperso'){
                return view('/layouts/competence_interperso');
            }
            else if($req->input('section')==='conference_seminaire'){
                return view('/layouts/conference_seminaire');
            }
            else if($req->input('section')==='loisir_interet'){
                return view('/layouts/loisir_interet');
            }
            else if($req->input('section')==='oeuvre_creative'){
                return view('/layouts/oeuvre_creative');
            }
            else if($req->input('section')==='permis_conduire'){
                return view('/layouts/permis_conduire');
            }
            else if($req->input('section')==='prix_distinction'){
                return view('/layouts/prix_distinction');
            }
            else if($req->input('section')==='projet'){
                return view('/layouts/projet');
            }
            else if($req->input('section')==='publication'){
                return view('/layouts/publication');
            }
            else if($req->input('section')==='recommandation'){
                return view('/layouts/recommandation');
            }
            else if($req->input('section')==='reseau_adhesion'){
                return view('/layouts/reseau_adhesion');
            }
            
        }
    }
}
