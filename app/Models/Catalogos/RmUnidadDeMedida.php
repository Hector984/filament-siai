<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RmUnidadDeMedida extends Model
{
    use HasFactory;

    protected $table = "rm_unidadesdemedida";
    public $timestamps = true;
    protected $fillable = ['id','Id_Umedida', 'Descripcion'];
}
