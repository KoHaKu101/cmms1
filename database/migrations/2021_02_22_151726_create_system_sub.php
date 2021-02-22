<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSub extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PMCS_SYSTEM_SUB', function (Blueprint $table) {
          $table->BigInteger('UNID')->primary();
          $table->BigInteger('SYSTEMSUBUNID_REF',false,false)->nullable()->index();
          $table->string('SYSTEMSUB_NAME',200)->nullable()->index();
          $table->string('SYSTEMSUB_STD',200)->nullable();
          $table->string('SYSTEMSUB_DATE',200)->nullable();
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
        Schema::dropIfExists('PMCS_SYSTEM_SUB');
    }
}
