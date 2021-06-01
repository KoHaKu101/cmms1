<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class sparepartplan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_CMMS_SPAREPART_PLAN', function (Blueprint $table) {
        // ต้องมีทุกหน้า
          $table->BigInteger('UNID')->primary();

          $table->BigInteger('MACHINE_UNID')->nullable()->index();
          $table->string('MACHINE_CODE',50)->nullable()->index();

          $table->BigInteger('SPAREPART_UNID')->nullable();
          $table->string('SPAREPART_NAME',200)->nullable();
          $table->string('SPAREPART_CODE',200)->nullable();
          $table->string('STATUS',50)->nullable();
          $table->string('REMARK',200)->nullable();

          $table->integer('PLAN_QTY')->nullable()->default(1);
          $table->integer('ACT_QTY')->nullable()->default(0);
          $table->integer('PERIOD')->nullable()->default(0);
          $table->integer('DOC_YEAR')->nullable();
          $table->integer('DOC_MONTH')->nullable();

          $table->date('PLAN_DATE')->nullable();
          $table->date('NEXT_DATE')->nullable();
          $table->date('COMPLETE_DATE')->nullable();

          $table->float('COST_STD')->nullable()->default(0);
          $table->float('COST_ACT')->nullable()->default(0);

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
          Schema::dropIfExists('PMCS_CMMS_SPAREPART_PLAN');
    }
}
