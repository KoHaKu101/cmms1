<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class selectmainrepair extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PMCS_CMMS_SELECT_MAIN_REPAIR', function (Blueprint $table) {
          $table->BigInteger('UNID')->primary();
          $table->string('REPAIR_MAINSELECT_NAME',200)->nullable()->index();
          $table->integer('REPAIR_MAINSELECT_INDEX')->nullable();
          $table->string('REMARK',500)->nullable();
          $table->integer('STATUS')->nullable()->default(9);


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
        Schema::dropIfExists('PMCS_CMMS_SELECT_MAIN_REPAIR');
    }
}
