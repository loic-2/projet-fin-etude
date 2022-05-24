<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateArchivageSuppticTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ADMINISTRATEUR', function (Blueprint $table) {
            $table->integer('ID_ADMINISTRATEUR')->primary();
            $table->string('NOM_ADMINISTRATEUR')->nullable();
            $table->string('EMAIL_ADMINISTRATEUR')->nullable();
            $table->string('LOGIN_ADMINISTRATEUR')->nullable();
            $table->string('MOT_DE_PASSE_ADMINISTRATEUR')->nullable();
            $table->string('TELEPHONE_ADMINISTRATEUR')->nullable();
            $table->boolean('CONNECTE')->nullable();
            $table->dateTime('DATE_CREATION_ADMINISTRATEUR')->nullable();
        });

        Schema::create('CATEGORIE', function (Blueprint $table) {
            $table->integer('ID_CATEGORIE')->primary();
            $table->string('NOM_CATEGORIE')->nullable();
        });

        Schema::create('CATEGORIE_PROJET', function (Blueprint $table) {
            $table->integer('ID_CATEGORIE')->index('I_FK_CATEGORIE_PROJET_CATEGORIE');
            $table->integer('ID_PROJET')->index('I_FK_CATEGORIE_PROJET_PROJET');
            $table->primary(['ID_CATEGORIE', 'ID_PROJET']);
        });

        Schema::create('ENCADREMENT', function (Blueprint $table) {
            $table->integer('ID_ENCADREUR')->index('I_FK_ENCADREMENT_ENCADREUR');
            $table->integer('ID_PROJET')->index('I_FK_ENCADREMENT_PROJET');
            $table->integer('ID_MEMBRE')->index('I_FK_ENCADREMENT_MEMBRE');
            $table->string('ANNEE_ENCADREMENT')->nullable();
            $table->string('TYPE_ENCADREMENT')->nullable();
            $table->primary(['ID_ENCADREUR', 'ID_PROJET', 'ID_MEMBRE']);
        });

        Schema::create('ENCADREUR', function (Blueprint $table) {
            $table->integer('ID_ENCADREUR')->primary();
            $table->string('NOM_ENCADREUR')->nullable();
            $table->string('PROFESSION_ENCADREUR')->nullable();
            $table->string('TELEPHONE_ENCADREUR', 32)->nullable();
        });

        Schema::create('HISTORIQUE', function (Blueprint $table) {
            $table->integer('ID_HISTORIQUE')->primary();
            $table->integer('ID_ADMINISTRATEUR')->index('I_FK_HISTORIQUE_ADMINISTRATEUR');
            $table->string('ACTION_HISTORIQUE')->nullable();
            $table->dateTime('DATE_HISTORIQUE')->nullable();
        });

        Schema::create('MEMBRE', function (Blueprint $table) {
            $table->integer('ID_MEMBRE')->primary();
            $table->string('NOM_MEMBRE')->nullable();
            $table->string('FILIERE_MEMBRE')->nullable();
            $table->string('TELEPHONE_MEMBRE')->nullable();
        });

        Schema::create('PROJET', function (Blueprint $table) {
            $table->integer('ID_PROJET')->primary();
            $table->string('TYPE_PROJET')->nullable();
            $table->string('PROMOTION_PROJET', 32)->nullable();
            $table->string('LIEN_FICHIER_PROJET')->nullable();
            $table->string('NOM_PROJET')->nullable();
            $table->integer('VUE_PROJET')->nullable();
            $table->integer('TELECHARGEMENT_PROJET')->nullable();
            $table->integer('GROUPE_PROJET')->nullable();
        });

        Schema::create('UTILISATEUR', function (Blueprint $table) {
            $table->integer('ID_UTILISATEUR')->primary();
            $table->string('NOM_UTILISATEUR')->nullable();
            $table->string('LOGIN_UTILISATEUR')->nullable();
            $table->string('EMAIL_UTILISATEUR')->nullable();
            $table->string('MOT_DE_PASSE_UTILISATEUR')->nullable();
            $table->string('MATRICULE_UTILISATEUR')->nullable();
            $table->dateTime('DATE_CREATION_UTILISATEUR')->nullable();
        });

        Schema::create('VISITE', function (Blueprint $table) {
            $table->integer('ID_VISITE')->primary();
            $table->dateTime('DATE_VISITE')->nullable();
        });

        Schema::table('CATEGORIE_PROJET', function (Blueprint $table) {
            $table->foreign(['ID_CATEGORIE'], 'CATEGORIE_PROJET_ibfk_1')->references(['ID_CATEGORIE'])->on('CATEGORIE')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ID_PROJET'], 'CATEGORIE_PROJET_ibfk_2')->references(['ID_PROJET'])->on('PROJET')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('ENCADREMENT', function (Blueprint $table) {
            $table->foreign(['ID_ENCADREUR'], 'ENCADREMENT_ibfk_1')->references(['ID_ENCADREUR'])->on('ENCADREUR')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ID_PROJET'], 'ENCADREMENT_ibfk_2')->references(['ID_PROJET'])->on('PROJET')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ID_MEMBRE'], 'ENCADREMENT_ibfk_3')->references(['ID_MEMBRE'])->on('MEMBRE')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('HISTORIQUE', function (Blueprint $table) {
            $table->foreign(['ID_ADMINISTRATEUR'], 'HISTORIQUE_ibfk_1')->references(['ID_ADMINISTRATEUR'])->on('ADMINISTRATEUR')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('HISTORIQUE', function (Blueprint $table) {
            $table->dropForeign('HISTORIQUE_ibfk_1');
        });

        Schema::table('ENCADREMENT', function (Blueprint $table) {
            $table->dropForeign('ENCADREMENT_ibfk_1');
            $table->dropForeign('ENCADREMENT_ibfk_2');
            $table->dropForeign('ENCADREMENT_ibfk_3');
        });

        Schema::table('CATEGORIE_PROJET', function (Blueprint $table) {
            $table->dropForeign('CATEGORIE_PROJET_ibfk_1');
            $table->dropForeign('CATEGORIE_PROJET_ibfk_2');
        });

        Schema::dropIfExists('VISITE');

        Schema::dropIfExists('UTILISATEUR');

        Schema::dropIfExists('PROJET');

        Schema::dropIfExists('MEMBRE');

        Schema::dropIfExists('HISTORIQUE');

        Schema::dropIfExists('ENCADREUR');

        Schema::dropIfExists('ENCADREMENT');

        Schema::dropIfExists('CATEGORIE_PROJET');

        Schema::dropIfExists('CATEGORIE');

        Schema::dropIfExists('ADMINISTRATEUR');
    }
}
