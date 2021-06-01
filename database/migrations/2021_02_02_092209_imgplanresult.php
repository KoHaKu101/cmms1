<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class imgplanresult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PMCS_CMMS_UPLOAD_IMG', function (Blueprint $table) {
          $table->BigInteger('UNID')->primary();
          $table->BigInteger('UNID_REF')->nullable();
          $table->string('FILE_NAME',200)->nullable();
          $table->string('FILE_EXT',200)->nullable();

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
        Schema::dropIfExists('PMCS_CMMS_UPLOAD_IMG');
    }
}
