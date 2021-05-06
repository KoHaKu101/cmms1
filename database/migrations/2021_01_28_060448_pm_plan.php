<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class pmplan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_MACHINE_PLAN_PM', function (Blueprint $table) {
        // ต้องมีทุกหน้า
          $table->BigInteger('UNID')->primary();
          $table->integer('PLAN_YEAR')->nullable()->index();
          $table->integer('PLAN_MONTH')->nullable()->index();
          $table->date('PLAN_DATE')->nullable();
          $table->date('PLAN_NEXTDATE')->nullable();
          $table->string('PLAN_DOCNO',50)->nullable();
          $table->BigInteger('MACHINE_UNID')->nullable();
          $table->string('MACHINE_NAME',500)->nullable();
          $table->string('MACHINE_CODE',50)->nullable()->index();
          $table->string('MACHINE_LINE',50)->nullable()->index();
          $table->integer('PLAN_PERIOD')->nullable();
          $table->string('PLAN_RANK',50)->nullable();
          $table->string('PM_TYPE',50)->nullable();
          $table->string('PM_MASTER_NAME',200)->nullable();
          $table->BigInteger('PM_MASTER_UNID')->nullable();
          $table->string('PLAN_STATUS',50)->nullable();
          $table->string('PLAN_RE_MARK',200)->nullable();
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
          Schema::dropIfExists('PMCS_MACHINE_PLAN_PM');
    }
}
