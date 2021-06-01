<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class plansparepartimg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_CMMS_SPAREPART_PLAN_IMG', function (Blueprint $table) {
        // ต้องมีทุกหน้า
          $table->BigInteger('UNID')->primary();
          $table->BigInteger('PLAN_SPAREPART_UNID')->nullable();
          $table->string('FILE_NAME',200)->nullable();
          $table->string('FILE_EXT',200)->nullable();
          $table->string('FILE_PATH',200)->nullable();

          $table->integer('DOC_YEAR')->nullable()->default(0);
          $table->integer('DOC_MONTH')->nullable()->default(0);



          // ต้องมีทุกหน้า
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
        Schema::dropIfExists('PMCS_CMMS_SPAREPART_PLAN_IMG');
    }
}
