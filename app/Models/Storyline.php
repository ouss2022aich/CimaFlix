<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storyline extends Model
{
    use HasFactory;

    public function users () {
        return $this->belongsToMany(User::class, 'favourites');
    }
    public function seasons(){
        return $this->hasMany(Season::class);
    }

    protected $fillable = [
        'title' ,
        'description',
        'type',
        'release_date' ,
        'trailer',
        'rating' ,
    ];

}
