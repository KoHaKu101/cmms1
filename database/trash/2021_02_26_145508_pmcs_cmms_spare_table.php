<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PmcsCmmsSpareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_CMMS_SPARE_PART_TABLE', function (Blueprint $table) {
      $table->BigInteger('UNID')->nullable();
      $table->integer('SPAREPART_CODE')->primary();
      $table->string('SPAREPART_NAME',200)->nullable();
      $table->float('SPAREPART_PRICE')->nullable();
      $table->string('SPAREPART_NOTE',500)->nullable();
      $table->integer('SPAREPART_STATUS')->nullable();

      $table->string('CREATE_BY',200)->nullable();
      $table->string('CREATE_TIME',40)->nullable();
      $table->string('MODIFY_BY',200)->nullable();
      $table->string('MODIFY_TIME',40)->nullable();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PMCS_CMMS_SPARE_PART_TABLE');
    }
}
