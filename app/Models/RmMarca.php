<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RmMarca extends Model
{
    use HasFactory;

    protected $table = "rm_marcas";
    public $timestamps = true;
    protected $primaryKey = 'marca_id';
    protected $fillable = ['marca_id','marca_descripcion'];
}
