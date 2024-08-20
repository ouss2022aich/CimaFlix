<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    public function storyline(){
        return $this->belongsTo(Storyline::class);
    }

    public function episodes(){
        return $this->hasMany(Episode::class);
    }
}
