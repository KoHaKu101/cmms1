<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mainmenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_CMMS_MENU', function (Blueprint $table) {
        // ต้องมีทุกหน้า
          $table->BigInteger('UNID')->primary();


          $table->string('MENU_NAME',200)->nullable()->index();
          $table->string('MENU_EN',200)->nullable();
          $table->integer('MENU_INDEX')->nullable();
          $table->string('MENU_STATUS',50)->nullable();
          $table->string('MENU_ICON',50)->nullable();
          $table->string('MENU_CLASS',50)->nullable();
          $table->string('MENU_LINK',50)->nullable()->index();
          $table->SoftDeletes();

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
          Schema::dropIfExists('PMCS_CMMS_MENU');
    }
}
