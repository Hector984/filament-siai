<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RmSubGrupo extends Model
{
    use HasFactory;

    protected $table = "rm_subgrupo";
    public $timestamps = true;
    protected $fillable = ['Subgrupo','Ctmayor','Descripcion'];
}
