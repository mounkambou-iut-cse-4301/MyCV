<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommandationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommandations', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('role')->nullable();
            $table->string('adresse_electronique')->nullable();
            $table->bigInteger('numero')->nullable();
            $table->text('description')->nullable();
            $table->string('lien')->nullable();
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
        Schema::dropIfExists('recommandations');
    }
}
