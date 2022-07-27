<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrationRemoveForeignKeyIDAdministrateurToHistoriqueAddForeignKeyIdFromUsersToIt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('HISTORIQUE', function (Blueprint $table) {
            $table->dropForeign('HISTORIQUE_ibfk_1');
        });
        Schema::dropIfExists('HISTORIQUE');
        Schema::create('HISTORIQUE', function (Blueprint $table) {
            $table->integer('ID_HISTORIQUE', true);
            $table->string('ACTION_HISTORIQUE')->nullable();
            $table->timestamp('DATE_HISTORIQUE')->nullable();
        });
        Schema::table('HISTORIQUE', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
        Schema::dropIfExists('HISTORIQUE');
    }
}
