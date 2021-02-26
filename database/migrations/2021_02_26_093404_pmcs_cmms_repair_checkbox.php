<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PmcsCmmsRepairCheckbox extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PMCS_CMMS_REPAIR_CHECKBOX', function (Blueprint $table) {
        $table->BigInteger('UNID')->primary();
        $table->string('REPAIR_CODE',50)->nullable()->index();
        $table->string('REPAIR_NAME',50)->nullable()->index();
        $table->string('REPAIR_TYPE_CODE',40)->nullable();
        $table->string('REPAIR_NOTE',200)->nullable();

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
        Schema::dropIfExists('PMCS_CMMS_REPAIR_CHECKBOX');
    }
}
