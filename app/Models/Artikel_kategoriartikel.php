<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel_kategoriartikel extends Model
{
    use HasFactory;
    protected $table = 'artikel_kategoriartikel';
    protected $fillable = ['kategoriartikel_id', 'artikel_id'];
}
