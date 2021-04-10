<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class machinepmlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PMCS_CMMS_MACHINE_PMLIST', function (Blueprint $table) {
          $table->BigInteger('UNID')->primary();
          $table->BigInteger('PM_TEMPLATELIST_UNID_REF')->nullable();
          $table->BigInteger('MACHINEPM_UNID_REF')->nullable();

          $table->date('PM_TEMPLATELIST_LASTDUE')->nullable();

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
        Schema::dropIfExists('PMCS_CMMS_MACHINE_PMLIST');
    }
}
