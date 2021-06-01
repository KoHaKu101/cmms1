<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mailserver extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_CMMS_SETUP_MAIL', function (Blueprint $table) {
        $table->BigInteger('UNID')->primary();
        $table->string('MAILHOST',200)->nullable();
        $table->string('EMAILADDRESS',200)->nullable();
        $table->string('MAILPASSWORD',200)->nullable();
        $table->string('MAILPORT',50)->nullable();
        $table->string('MAILPROTOCOL',50)->nullable();
        $table->integer('AUTOMAIL')->default(7)->nullable();
        $table->integer('AUTOPLAN')->default(730)->nullable();
        $table->integer('PLAN_CHECK')->default(0)->nullable();


        $table->string('CREATE_BY',200)->nullable();
        $table->string('CREATE_TIME',50)->nullable();
        $table->string('MODIFY_BY',200)->nullable();
        $table->string('MODIFY_TIME',50)->nullable();

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('PMCS_CMMS_SETUP_MAIL');
    }
}
