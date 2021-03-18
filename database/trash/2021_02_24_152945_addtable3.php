<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class addtable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('PMCS_CMMS_MACHINE_SYSTEMCHECK', function (Blueprint $table) {
          $table->date('SYSTEM_MONTHSTORE')->nullable()->after('SYSTEM_MONTHCHECK');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PMCS_CMMS_MACHINE_SYSTEMCHECK');
    }
}
