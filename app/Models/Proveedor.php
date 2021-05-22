<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cheque;
use App\Models\Producto;
use App\Models\Vencimiento;


class Proveedor extends Model
{
    use HasFactory;

    public function cheques(){

        return $this->hasMany(Cheque::class);

    }

    public function productos(){

        return $this->hasMany(Producto::class);

    }

    public function vencimientos(){

        return $this->hasMany(Vencimiento::class);

    }

}
