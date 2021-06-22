<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;
    protected $table = 'agama';

    public function pelanggan(): HasMany
    {
        return $this->hasMany(Pelanggan::class);
    }
}
