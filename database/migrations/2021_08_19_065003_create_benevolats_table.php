<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenevolatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benevolats', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('lieu')->nullable();
            $table->string('debut_date')->nullable();
            $table->string('fin_date')->nullable();
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
        Schema::dropIfExists('benevolats');
    }
}
