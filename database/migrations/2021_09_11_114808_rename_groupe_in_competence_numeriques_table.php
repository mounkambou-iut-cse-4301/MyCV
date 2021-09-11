<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameGroupeInCompetenceNumeriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competence_numeriques', function (Blueprint $table) {
            $table->renameColumn('groupe','technologie');
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
            $table->renameColumn('technologie','groupe');
        });
    }
}
