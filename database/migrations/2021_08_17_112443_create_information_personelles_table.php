<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationPersonellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_personelles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('titre');
            $table->text('description')->nullable();
            $table->string('date_naissance');
            $table->string('sexe');
            $table->string('nationalite');
            $table->string('nom_photo')->nullable();
            $table->string('email');
            $table->bigInteger('numero_telephone');
            $table->string('linkedin')->nullable();
            $table->string('tweetter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('site_web')->nullable();
            $table->string('pays');
            $table->string('ville');
            $table->string('localite');
            $table->string('code_postal')->nullable();
            $table->integer('status');
            $table->foreignId('utilisateur_id')
                  ->constrained('utilisateurs')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information_personelles');
    }
}
