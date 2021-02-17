<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpload2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PMCS_MACHINES_UPLOAD', function (Blueprint $table) {
          $table->BigInteger('UNID')->primary();
          $table->BigInteger('UPLOAD_UNID_REF',false,false)->nullable();
          $table->string('MACHINE_CODE',50)->nullable()->index();
          $table->string('TOPIC_NAME',50)->nullable()->index();
          $table->string('FILE_UPLOAD',200)->nullable();
          $table->string('FILE_SIZE',50)->nullable();
          $table->string('FILE_NAME',50)->nullable();
          $table->string('FILE_EXTENSION',50)->nullable();
          $table->string('FILE_UPLOADDATETIME',50)->nullable();

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
        Schema::dropIfExists('PMCS_MACHINES_UPLOAD');
    }
}
