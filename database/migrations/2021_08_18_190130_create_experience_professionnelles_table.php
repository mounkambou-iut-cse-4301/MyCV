<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceProfessionnellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_professionnelles', function (Blueprint $table) {
            $table->id();
            $table->string('poste');
            $table->string('employeur')->nullable();
            $table->string('pays')->nullable();
            $table->string('localite')->nullable();
            $table->string('debut_date')->nullable();
            $table->string('fin_date')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('experience_professionnelles');
    }
}
