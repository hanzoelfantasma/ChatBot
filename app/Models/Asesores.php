<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesores extends Model
{
    use HasFactory;
    protected $table='appbot_asesor';
    protected $primaryKey='id_asesor';
    protected $fillable =
        [
            'nombre_completo',
            'celular',
            'numero_documento',
            'updated_at',
            'created_ad',
            'estado',
            'id_asesor'
        ];
}
