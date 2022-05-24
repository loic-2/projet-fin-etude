<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdProjetColumnToMembre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('MEMBRE', function (Blueprint $table) {
            $table->integer('ID_PROJET');
        });

        Schema::table('MEMBRE', function (Blueprint $table) {
            $table->foreign(['ID_PROJET'], 'MEMBRE_ibfk_1')->references(['ID_PROJET'])->on('PROJET')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('MEMBRE', function (Blueprint $table) {
            //
        });
    }
}
