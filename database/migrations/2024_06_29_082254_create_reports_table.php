<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('report', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelapor');
            $table->string('jurusan');
            $table->string('program_studi');
            $table->string('kelas');
            $table->integer('no_hp');
            $table->string('lpr_sebagai');
            $table->date('tgl_kejadian');
            $table->string('kronologi');
            $table->string('bentuk_kekerasan');
            $table->string('informasi_pelaku');
            $table->string('informasi_korban');
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report');
    }
};