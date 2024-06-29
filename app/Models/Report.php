<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'report';
    protected $fillable = [
        'nama_pelapor',
        'jurusan',
        'program_studi',
        'kelas',
        'no_hp',
        'lpr_sebagai',
        'tgl_kejadian',
        'kronologi',
        'bentuk_kekerasan',
        'informasi_pelaku',
        'informasi_korban',
        'bukti',
    ];
}
