<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_formations', function (Blueprint $table) {
            $table->id();
            $table->string('qualification');
            $table->string('organisme')->nullable();
            $table->string('adresse')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('pays')->nullable();
            $table->string('site_web')->nullable();
            $table->string('debut_date')->nullable();
            $table->string('fin_date')->nullable();
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
        Schema::dropIfExists('education_formations');
    }
}
