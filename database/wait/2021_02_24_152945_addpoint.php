<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class addpoint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('PMCS_CMMS_PM_TEMPLATE_LIST', function (Blueprint $table) {
          $table->string('PM_TEMPLATELIST_POINT',250)->nullable()->after('PM_TEMPLATELIST_NAME');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PMCS_CMMS_PM_TEMPLATE_LIST');
    }
}
