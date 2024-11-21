<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;

    protected $table = "tb_cat_dependencias";
    public $timestamps = true;
    protected $primaryKey = 'id_dependencia';
    protected $fillable = ['id_dependencia','ln_dependencia'];
}
