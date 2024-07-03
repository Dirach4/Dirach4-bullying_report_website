<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('jurusan')->nullable()->after('usertype');
            $table->string('prodi')->nullable()->after('jurusan');
            $table->string('kelas')->nullable()->after('prodi');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['jurusan', 'prodi', 'kelas',]);
        });
    }
}
