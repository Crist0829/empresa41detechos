<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cotizacion;
use App\Models\Real;

class Trabajo extends Model
{
    use HasFactory;

    public function presupuesto(){
        return $this->hasOne(Cotizacion::class);
    }
    
    public function presupuestoReal(){
        return $this->hasOne(Real::class);
    }
}
