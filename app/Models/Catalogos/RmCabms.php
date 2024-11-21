<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catalogos\RmNivel;

class RmCabms extends Model
{
    use HasFactory;

    protected $table = "rm_cabmses";
    public $timestamps= true;
    protected $primaryKey ="IdCabms";
    protected $keyType = 'string';
    protected $fillable = ['IdCabms', 'Descripcion', 'Nivel', 'Partida1', 'Partida2', 'Estatus', 'Ccop', 'Pcontable', 'Descpartida'];


}
