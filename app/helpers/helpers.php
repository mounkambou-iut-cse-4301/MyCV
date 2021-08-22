<?php
use App\Models\Utilisateur;
use App\Models\InformationPersonelle;


if(!function_exists('getName')){
	function getName(){
		
		$user = Utilisateur::where('id',session('LoggedUser'))->first();
		return $user->name;
	}
}

if(!function_exists('getEmail')){
	function getEmail(){
		
		$user = Utilisateur::where('id',session('LoggedUser'))->first();
		return $user->email;
	}
}

if(!function_exists('getImage')){
	function getImage(){
		
		$user =InformationPersonelle::where('utilisateur_id',session('LoggedUser'))->first();
		      if($user!==null){
				return $user->nom_photo;
			  }
           
        
	}
}

?>