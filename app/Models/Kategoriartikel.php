<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kategoriartikel extends Model
{
    use HasFactory;
    protected $table = 'kategoriartikel';
    protected $fillable = ['nama'];


    public function artikel(): BelongsToMany
    {
        return $this->belongsToMany(Artikel::class);
    }
}
