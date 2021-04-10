<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mailalert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_CMMS_SETUP_MAIL_ALERT', function (Blueprint $table) {
        $table->BigInteger('UNID')->primary();
        $table->string('EMAILADDRESS1',200)->nullable();
        $table->string('EMAILADDRESS2',200)->nullable();
        $table->string('EMAILADDRESS3',200)->nullable();
        $table->string('EMAILADDRESS4',200)->nullable();
        $table->string('EMAILADDRESS5',200)->nullable();

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
        Schema::dropIfExists('PMCS_CMMS_SETUP_MAIL_ALERT');
    }
}
