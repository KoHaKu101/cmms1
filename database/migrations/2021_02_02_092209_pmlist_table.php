<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PmListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PMCS_CMMS_PM_TEMPLATE_LIST', function (Blueprint $table) {
          $table->BigInteger('UNID')->primary();
          $table->BigInteger('PM_TEMPLATE_UNID_REF',false,false)->nullable();
          $table->integer('PM_TEMPLATELIST_INDEX')->default(0);
          $table->string('PM_TEMPLATELIST_NAME',200)->nullable();
          $table->string('PM_TEMPLATELIST_CHECK',200)->nullable();
          $table->string('PM_TEMPLATELIST_POINT',200)->nullable();
          $table->integer('PM_TEMPLATELIST_DAY')->nullable();
          $table->date('PM_TEMPLATELIST_LASTDUE')->nullable();
          $table->date('PM_TEMPLATELIST_DUE')->nullable();
          $table->integer('PM_TEMPLATELIST_NOTIFY')->nullable();
          $table->integer('PM_TEMPLATELIST_STATUS')->nullable();

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
        Schema::dropIfExists('PMCS_CMMS_PM_TEMPLATE_LIST');
    }
}
