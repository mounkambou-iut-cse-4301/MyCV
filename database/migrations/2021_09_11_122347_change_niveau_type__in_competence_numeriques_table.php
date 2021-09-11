<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNiveauTypeInCompetenceNumeriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competence_numeriques', function (Blueprint $table) {
            $table->integer('niveau')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competence_numeriques', function (Blueprint $table) {
            $table->text('niveau')->change();
        });
    }
}
