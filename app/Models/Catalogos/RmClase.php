<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RmClase extends Model
{
    use HasFactory;

    protected $table = "rm_clase";
    public $timestamps = true;
    protected $fillable = ['Id_Clase','Subgrupo','Clase','Descripcion'];
}
