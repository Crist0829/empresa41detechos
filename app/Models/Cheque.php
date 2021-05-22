<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    use HasFactory;

    protected $fillable = [

        'banco', 'fecha_pago', 'fecha_vencimiento_c', 'pagado', 'proveedor_id', 'numero'

    ];
}
