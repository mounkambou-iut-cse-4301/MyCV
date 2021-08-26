<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['AuthCheck'])->group(function () {
Route::get('/dashboard',[CVController::class,'dashboard']);
Route::match(['get','post'],'/login',[CVController::class,'login'])->name('login');
Route::match(['get','post'],'/register',[CVController::class,'register'])->name('register');
Route::get('/logout',[CVController::class,'logout'])->name('logout');

Route::match(['get','post'],'/info_personelle',[CVController::class,'info_personelle'])->name('info_personelle');
Route::match(['get','post'],'/experience_pro',[CVController::class,'experience_pro'])->name('experience_pro');
Route::get('/delete_exp_pro/{id?}', [CVController::class,'delete_exp_pro'])->name('delete_exp_pro');

Route::match(['get','post'],'/education_formation',[CVController::class,'education_formation'])->name('education_formation');
Route::get('/delete_edu_form/{id?}', [CVController::class,'delete_edu_form'])->name('delete_edu_form');

Route::match(['get','post'],'/competence_ling',[CVController::class,'competence_ling'])->name('competence_ling');
Route::get('/delete_comp_ling/{id?}', [CVController::class,'delete_comp_ling'])->name('delete_comp_ling');

Route::match(['get','post'],'/competence_num',[CVController::class,'competence_num'])->name('competence_num');
Route::get('/delete_comp_num/{id?}', [CVController::class,'delete_comp_num'])->name('delete_comp_num');

Route::match(['get','post'],'/activite_sociale_politique',[CVController::class,'activite_sociale_politique'])->name('activite_sociale_politique');
Route::get('/delete_act_soc_pol/{id?}', [CVController::class,'delete_act_soc_pol'])->name('delete_act_soc_pol');

Route::match(['get','post'],'/benevolat',[CVController::class,'benevolat'])->name('benevolat');
Route::get('/delete_benevolat/{id?}', [CVController::class,'delete_benevolat'])->name('delete_benevolat');

Route::match(['get','post'],'/competence_matiere_orga',[CVController::class,'competence_matiere_orga'])->name('competence_matiere_orga');
Route::get('/delete_comp_organisation/{id?}', [CVController::class,'delete_comp_organisation'])->name('delete_comp_organisation');

Route::match(['get','post'],'/competence_matiere_gestion',[CVController::class,'competence_matiere_gestion'])->name('competence_matiere_gestion');
Route::get('/delete_comp_gestion/{id?}', [CVController::class,'delete_comp_gestion'])->name('delete_comp_gestion');

Route::match(['get','post'],'/competence_interperso',[CVController::class,'competence_interperso'])->name('competence_interperso');
Route::get('/delete_comp_interperso/{id?}', [CVController::class,'delete_comp_interperso'])->name('delete_comp_interperso');

Route::match(['get','post'],'/conference_seminaire',[CVController::class,'conference_seminaire'])->name('conference_seminaire');
Route::get('/delete_conf_semi/{id?}', [CVController::class,'delete_conf_semi'])->name('delete_conf_semi');

Route::match(['get','post'],'/loisir_interet',[CVController::class,'loisir_interet'])->name('loisir_interet');
Route::get('/delete_loisir/{id?}', [CVController::class,'delete_loisir'])->name('delete_loisir');

Route::match(['get','post'],'/oeuvre_creative',[CVController::class,'oeuvre_creative'])->name('oeuvre_creative');
Route::get('/delete_oeuvre_creative/{id?}', [CVController::class,'delete_oeuvre_creative'])->name('delete_oeuvre_creative');

Route::match(['get','post'],'/prix_distinction',[CVController::class,'prix_distinction'])->name('prix_distinction');
Route::get('/delete_prix_distinction/{id?}', [CVController::class,'delete_prix_distinction'])->name('delete_prix_distinction');

Route::match(['get','post'],'/projet',[CVController::class,'projet'])->name('projet');
Route::get('/delete_projet/{id?}', [CVController::class,'delete_projet'])->name('delete_projet');

Route::match(['get','post'],'/publication',[CVController::class,'publication'])->name('publication');
Route::get('/delete_publication/{id?}', [CVController::class,'delete_publication'])->name('delete_publication');

Route::match(['get','post'],'/recommandation',[CVController::class,'recommandation'])->name('recommandation');
Route::get('/delete_recommandation/{id?}', [CVController::class,'delete_recommandation'])->name('delete_recommandation');

Route::match(['get','post'],'/reseau_adhesion',[CVController::class,'reseau_adhesion'])->name('reseau_adhesion');
Route::get('/delete_reseau_adhesion/{id?}', [CVController::class,'delete_reseau_adhesion'])->name('delete_reseau_adhesion');

Route::match(['get','post'],'/permis_conduire',[CVController::class,'permis_conduire'])->name('permis_conduire');
Route::get('/delete_permis_conduire/{id?}', [CVController::class,'delete_permis_conduire'])->name('delete_permis_conduire');


Route::match(['get','post'],'/changer_image', [CVController::class,'changer_image'])->name('changer_image');


Route::match(['get','post'],'/modifier_pass',[CVController::class,'modifier_pass'])->name('modifier_pass');
});
