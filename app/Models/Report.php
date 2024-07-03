<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Report extends Model
{
    use HasFactory;
    protected $table = 'report';
    protected $fillable = [
        'lpr_sebagai',
        'tgl_kejadian',
        'kronologi',
        'area_kejadian',
        'bentuk_kekerasan',
        'informasi_pelaku',
        'informasi_korban',
        'bukti',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
