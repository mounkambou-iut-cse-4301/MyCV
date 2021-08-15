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

Route::get('/dashboard',[CVController::class,'dashboard']);
Route::get('/login',[CVController::class,'login'])->name('login');
Route::get('/register',[CVController::class,'register'])->name('register');
Route::get('/info_personelle',[CVController::class,'info_personelle'])->name('info_personelle');
Route::get('/experience_pro',[CVController::class,'experience_pro'])->name('experience_pro');
Route::get('/education_formation',[CVController::class,'education_formation'])->name('education_formation');
Route::get('/competence_ling',[CVController::class,'competence_ling'])->name('competence_ling');
Route::get('/competence_num',[CVController::class,'competence_num'])->name('competence_num');
Route::get('/activite_sociale_politique',[CVController::class,'activite_sociale_politique'])->name('activite_sociale_politique');
Route::get('/benevolat',[CVController::class,'benevolat'])->name('benevolat');
Route::get('/competence_matiere_orga',[CVController::class,'competence_matiere_orga'])->name('competence_matiere_orga');
Route::get('/competence_matiere_gestion',[CVController::class,'competence_matiere_gestion'])->name('competence_matiere_gestion');
Route::get('/competence_interperso',[CVController::class,'competence_interperso'])->name('competence_interperso');
Route::get('/conference_seminaire',[CVController::class,'conference_seminaire'])->name('conference_seminaire');
Route::get('/loisir_interet',[CVController::class,'loisir_interet'])->name('loisir_interet');
Route::get('/oeuvre_creative',[CVController::class,'oeuvre_creative'])->name('oeuvre_creative');
Route::get('/permis_conduire',[CVController::class,'permis_conduire'])->name('permis_conduire');
Route::get('/prix_distinction',[CVController::class,'prix_distinction'])->name('prix_distinction');
Route::get('/projet',[CVController::class,'projet'])->name('projet');
Route::get('/publication',[CVController::class,'publication'])->name('publication');
Route::get('/recommandation',[CVController::class,'recommandation'])->name('recommandation');
Route::get('/reseau_adhesion',[CVController::class,'reseau_adhesion'])->name('reseau_adhesion');
Route::get('/modifier_pass',[CVController::class,'modifier_pass'])->name('modifier_pass');

Route::match(['get','post'],'/ajouter_section',[CVController::class,'ajouter_section'])->name('ajouter_section');


