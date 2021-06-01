<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class machinesparepart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_CMMS_MACHINE_SPAREPART', function (Blueprint $table) {
        // ต้องมีทุกหน้า
        $table->BigInteger('UNID')->nullable();
        $table->BigInteger('MACHINE_UNID');
        $table->string('MACHINE_CODE',50)->nullable()->index();

        $table->BigInteger('SPAREPART_UNID');
        $table->string('SPAREPART_NAME',200)->nullable();
        $table->string('SPAREPART_CODE',200)->nullable();
        $table->string('STATUS',50)->nullable();
        $table->string('REMARK',200)->nullable();

        $table->integer('SPAREPART_QTY')->nullable()->default(1);
        $table->integer('PERIOD')->nullable()->default(0);

        $table->date('LAST_CHANGE')->nullable();
        $table->date('NEXT_PLAN_DATE')->nullable();

        $table->float('COST_STD')->nullable()->default(0);

        // ต้องมีทุกหน้า
        $table->string('CREATE_BY',200)->nullable();
        $table->string('CREATE_TIME',50)->nullable();
        $table->string('MODIFY_BY',200)->nullable();
        $table->string('MODIFY_TIME',50)->nullable();

        $table->primary(['MACHINE_UNID','SPAREPART_UNID']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('PMCS_CMMS_MACHINE_SPAREPART');
    }
}
