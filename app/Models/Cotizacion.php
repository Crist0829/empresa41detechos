<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mano;
use App\Models\Material;

class Cotizacion extends Model
{
    use HasFactory;


    public function mano(){
        return $this->hasMany(Mano::class);
    }
    
    public function material(){
        return $this->hasMany(Material::class);
    }
}
