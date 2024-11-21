<?php

namespace App\Models\catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RmSeccion extends Model
{
    use HasFactory;
    protected $table = "rm_secciones";
    public $timestamps = true;
    protected $primaryKey = 'Id_Seccion';
    protected $fillable = ['Id_Seccion', 'Seccion'];

}
