<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('report', function (Blueprint $table) {
            $table->integer('area_kejadian')->nullable()->after('tgl_kejadian');
        });
    }

    public function down()
    {
        Schema::table('report', function (Blueprint $table) {
            $table->dropColumn(['area_kejadian']);
        });
    }
};
