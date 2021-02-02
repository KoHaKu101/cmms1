<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormfactoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formfactories', function (Blueprint $table) {
            $table->BigInteger('UNID')->primary();

            $table->string('NUMBER_M',200)->nullable()->unique();
            $table->string('PRODUCT_M',200)->nullable()->index();
            $table->string('NAME_M',200)->nullable();
            $table->string('MODEL_M',200)->nullable();
            $table->string('SERIES_M',200)->nullable()->unique();
            $table->DATE('DATE_M',200)->nullable();
            $table->string('POWER_M',200)->nullable();
            $table->string('WHIGHT_M',200)->nullable();
            $table->string('BUY_M',200)->nullable();
            $table->string('TYPE_M',200)->nullable();
            $table->string('IMG_M',200)->nullable();
            $table->string('QRCODE_M',200)->nullable();

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
        Schema::dropIfExists('formfactories');
    }
}
