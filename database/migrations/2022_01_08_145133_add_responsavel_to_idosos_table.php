<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResponsavelToIdososTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('idosos', function (Blueprint $table) {
            $table->char('name_resp', 255);
            $table->char('telefone', 100);
            $table->char('email', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('idosos', function (Blueprint $table) {
            $table->dropColumn('name_resp');
            $table->dropColumn('telefone');
            $table->dropColumn('email');
        });
    }
}
