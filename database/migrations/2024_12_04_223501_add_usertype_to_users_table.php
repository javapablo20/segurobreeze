<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsertypeToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('usertype')->default('user'); // A coluna 'usertype' será criada com o valor padrão 'user'
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('usertype'); // Remove a coluna 'usertype' caso a migration seja revertida
        });
    }
}