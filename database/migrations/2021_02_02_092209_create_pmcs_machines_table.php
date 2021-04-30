<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmcsMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PMCS_MACHINES', function (Blueprint $table) {

          $table->string('MACHINE_CODE',50)->primary();
          $table->string('MACHINE_NAME',500)->nullable();
          $table->string('MACHINE_CHECK',50)->nullable();
          $table->string('MACHINE_MANU',500)->nullable();
          $table->string('MACHINE_TYPE',250)->nullable();
          $table->integer('MACHINE_TYPE_STATUS')->nullable();

          $table->date('MACHINE_STARTDATE')->nullable();
          $table->date('MACHINE_RVE_DATE')->nullable();
          $table->string('MACHINE_ICON',50)->nullable();
          $table->float('MACHINE_PRICE')->nullable();
          $table->string('MACHINE_LINE',40)->nullable();
          $table->string('GROUP_NAME',500)->nullable();

          $table->float('MACHINE_MA_COST')->nullable();
          $table->float('MACHINE_TOTAL_FEED')->nullable();
          $table->float('MACHINE_TOTAL_STOP')->nullable();
          $table->string('MACHINE_SPEED_UNIT',250)->nullable();
          $table->string('MACHINE_LOCATION',250)->nullable();
          $table->string('MACHINE_GROUP',250)->nullable();
          $table->string('MACHINE_PARTNO',250)->nullable();

          $table->string('MACHINE_MODEL',250)->nullable();
          $table->string('MACHINE_SERIAL',250)->nullable();
          $table->string('MACHINE_FACTORY',500)->nullable();
          $table->string('COMPANY_PAY',500)->nullable();
          $table->string('COMPANY_SETUP',500)->nullable();
          $table->string('MACHINE_CAPACITY',500)->nullable();

          $table->float('MACHINE_SPEED')->nullable();
          $table->float('MACHINE_MTBF')->nullable();
          $table->float('MACHINE_MTTF')->nullable();
          $table->float('MACHINE_MTTR')->nullable();
          $table->float('MACHINE_EFFICIENCY')->nullable();
          $table->string('MACHINE_POWER',40)->nullable();

          $table->string('MACHINE_WEIGHT',40)->nullable();
          $table->string('MACHINE_TARGET',40)->nullable();
          $table->text('MACHINE_NOTE',200)->nullable();
          $table->integer('MACHINE_STATUS')->nullable();
          $table->integer('MACHINE_POSTED')->nullable();
          $table->string('PCDS_MACHINE_CODE',150)->nullable();

          $table->string('WAREHOUSE_CODE',150)->nullable();
          $table->string('GROUP_CODE',150)->nullable();
          $table->string('LOCATION_CODE',500)->nullable();
          $table->string('SECTION_CODE',500)->nullable();
          $table->string('SUPPLIER_CODE',150)->nullable();
          $table->string('SUPPLIER_NAME',500)->nullable();

          $table->string('PURCHASE_FORM',500)->nullable();
          $table->string('EMP_CODE',150)->nullable();
          $table->string('EMP_NAME',500)->nullable();


          $table->BigInteger('POS_REF_UNID')->nullable();
          $table->integer('POS_X')->nullable();
          $table->integer('POS_Y')->nullable();

          $table->integer('POS_W')->nullable();
          $table->integer('POS_H')->nullable();
          $table->string('CREATE_BY',200)->nullable();
          $table->string('CREATE_TIME',40)->nullable();
          $table->string('MODIFY_BY',200)->nullable();
          $table->string('MODIFY_TIME',40)->nullable();
          $table->BigInteger('UNID')->nullable();
          $table->integer('SHIFT_TYPE')->nullable();
          $table->string('ESP_MAC',50)->nullable();
          $table->integer('MACHINE_RANK_MONTH')->nullable();
          $table->string('MACHINE_RANK_CODE',50)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PMCS_MACHINES');
    }
}
