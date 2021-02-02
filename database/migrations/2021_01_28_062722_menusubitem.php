<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Menusubitem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_CMMS_MENUSUBITEM', function (Blueprint $table) {
        // ต้องมีทุกหน้า
          $table->BigInteger('UNID')->primary();

          $table->BigInteger('SUBUNID_REF',false,false)->nullable()->index();
          $table->string('SUBMENU_NAME',200)->nullable()->index();
          $table->string('SUBMENU_EN',200)->nullable();
          $table->integer('SUBMENU_INDEX')->nullable();
          $table->string('SUBMENU_STATUS',50)->nullable();
          $table->string('SUBMENU_ICON',50)->nullable();
          $table->string('SUBMENU_CLASS',50)->nullable();
          $table->string('SUBMENU_LINK',50)->nullable()->index();
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
        Schema::dropIfExists('PMCS_CMMS_MENUSUBITEM');
    }
}
