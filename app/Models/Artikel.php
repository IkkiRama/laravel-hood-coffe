<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel';
    protected $fillable = ['user_id','title', 'slug_title', 'slug_content', 'content', 'foto'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function kategoriartikel(): BelongsToMany
    {
        return $this->belongsToMany(Kategoriartikel::class);
    }

}
