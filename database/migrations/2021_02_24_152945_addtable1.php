<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class addtable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('PMCS_CMMS_REPAIR_CHECKBOX', function (Blueprint $table) {
          $table->integer('REPAIR_STATUS')->nullable()->after('REPAIR_NOTE');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PMCS_CMMS_REPAIR_CHECKBOX');
    }
}
