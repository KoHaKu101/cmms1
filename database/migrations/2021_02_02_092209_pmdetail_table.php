<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PmDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PMCS_CMMS_PM_TEMPLATE_DETAIL', function (Blueprint $table) {
          $table->BigInteger('UNID')->primary();
          $table->BigInteger('PM_TEMPLATELIST_UNID_REF',false,false)->nullable();
          $table->string('PM_DETAIL_NAME',200)->nullable();

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
        Schema::dropIfExists('PMCS_CMMS_PM_TEMPLATE_DETAIL');
    }
}
