<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class repairreq extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PMCS_CMMS_REPAIR_REQ', function (Blueprint $table) {
          $table->BigInteger('UNID');
          $table->BigInteger('MACHINE_UNID')->nullable();
          $table->string('MACHINE_CODE',50)->nullable()->index();
          $table->string('MACHINE_LINE',50)->nullable();
          $table->string('MACHINE_NAME',500)->nullable();
          $table->string('MACHINE_STATUS',50)->nullable();
          $table->BigInteger('REPAIR_MAINSELECT_UNID')->nullable();
          $table->string('REPAIR_MAINSELECT_NAME',200)->nullable();
          $table->BigInteger('REPAIR_SUBSELECT_UNID')->nullable();
          $table->string('REPAIR_SUBSELECT_NAME',200)->nullable();
          $table->BigInteger('EMP_UNID')->nullable();
          $table->string('EMP_CODE',50)->nullable();
          $table->string('EMP_NAME',250)->nullable();
          $table->integer('PRIORITY')->nullable()->default(1);
          $table->string('DOC_NO',50);
          $table->date('DOC_DATE')->nullable();
          $table->string('REPAIR_REQ_TIME',50)->nullable();
          $table->integer('CLOSE_STATUS')->nullable();
          $table->string('CLOSE_BY',200)->nullable();

          $table->string('CREATE_BY',200)->nullable();
          $table->string('CREATE_TIME',50)->nullable();
          $table->string('MODIFY_BY',200)->nullable();
          $table->string('MODIFY_TIME',50)->nullable();

          $table->primary(['UNID','DOC_NO']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PMCS_CMMS_REPAIR_REQ');
    }
}
