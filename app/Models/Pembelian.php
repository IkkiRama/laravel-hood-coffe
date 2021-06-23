<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = "pembelian";
    protected $fillable = ['pelanggan_id', 'alamat_pengiriman', 'nama_kota', 'tarif', 'total_pembelian', 'resi_pengiriman', 'status_pembelian'];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }



    public function pembelianProduk(): HasMany
    {
        return $this->hasMany(PembelianProduk::class);
    }
}
