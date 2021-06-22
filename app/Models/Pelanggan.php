<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $fillable = ['nama_pelanggan', 'user_id', 'jenis_kelamin_id', 'agama_id', 'alamat_pelanggan', 'foto_pelanggan'];

    public function agama(): BelongsTo
    {
        return $this->belongsTo(Agama::class);
    }

     public function jenis_kelamin(): BelongsTo
    {
        return $this->belongsTo(Jenis_kelamin::class);
    }
}
