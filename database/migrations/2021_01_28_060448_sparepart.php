<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class sparepart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_CMMS_SPAREPART', function (Blueprint $table) {
        // ต้องมีทุกหน้า
        $table->string('SPAREPART_CODE',200)->primary();
          $table->BigInteger('UNID')->nullable()->index();
          $table->string('SPAREPART_NAME',200)->nullable()->index();

          $table->string('SPAREPART_MODEL',200)->nullable();
          $table->string('SPAREPART_SUBMODEL',200)->nullable();
          $table->string('SPAREPART_REMARK',500)->nullable();
          $table->string('SPAREPART_SIZE',200)->nullable();

          $table->integer('LAST_STOCK')->nullable()->default(0);
          $table->integer('SPAREPART_INDEX')->nullable()->default(0);
          $table->date('LAST_PUSCHE_DATE')->nullable();
          $table->date('LAST_ISSUE_DATE')->nullable();

          $table->integer('STOCK_MIN')->nullable()->default(0);
          $table->string('SUPPLIER_CODE',50)->nullable();
          $table->integer('STATUS')->nullable()->default(9);
          // ต้องมีทุกหน้า
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
          Schema::dropIfExists('PMCS_CMMS_SPAREPART');
    }
}
