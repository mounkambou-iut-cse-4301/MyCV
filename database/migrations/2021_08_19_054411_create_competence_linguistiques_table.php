<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenceLinguistiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competence_linguistiques', function (Blueprint $table) {
            $table->id();
            $table->string('langue')->nullable();
            $table->string('niveau')->nullable();
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
        Schema::dropIfExists('competence_linguistiques');
    }
}
