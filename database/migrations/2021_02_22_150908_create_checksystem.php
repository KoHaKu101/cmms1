<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecksystem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PMCS_SYSTEM_MAIN', function (Blueprint $table) {
          $table->BigInteger('UNID')->primary();
          
          $table->string('SYSTEM_NAME',200)->nullable()->index();
          $table->string('SYSTEM_DATE',200)->nullable();
          $table->string('SYSTEM_LASTDATE',200)->nullable();

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
        Schema::dropIfExists('PMCS_SYSTEM_MAIN');
    }
}
