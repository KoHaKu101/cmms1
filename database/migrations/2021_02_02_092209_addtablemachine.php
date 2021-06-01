<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class addtablemachine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('PMCS_MACHINE', function (Blueprint $table) {
          $table->integer('MACHINE_RANK_MONTH')->nullable();
          $table->string('MACHINE_RANK_CODE',50)->nullable();
          $table->date('PLAN_LAST_DATE')->nullable();
          $table->date('REPAIR_LAST_DATE')->nullable();
          $table->date('SPAR_PART_DATE')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PMCS_MACHINE');
    }
}
