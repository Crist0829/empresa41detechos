<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trabajo;

class Cliente extends Model
{
    use HasFactory;

    public function trabajos(){
        return $this->hasMany(Trabajo::class);
    }
}
