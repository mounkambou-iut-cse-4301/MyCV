<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameListeInCompetenceNumeriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competence_numeriques', function (Blueprint $table) {
            $table->renameColumn('liste','niveau');
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
            $table->renameColumn('niveau','liste');
        });
    }
}
