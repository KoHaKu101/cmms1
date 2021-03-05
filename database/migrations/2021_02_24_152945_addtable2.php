<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class addtable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('PMCS_REPAIR_MACHINE', function (Blueprint $table) {
          $table->integer('NOTIFICATION_STATUS')->nullable()->after('CLOSE_TIME');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PMCS_REPAIR_MACHINE');
    }
}
