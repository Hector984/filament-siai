<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catalogos\RmCabms;

class RmNivel extends Model
{
    use HasFactory;

    protected $table = "rm_niveles";
    public $timestamps = true;
    protected $primaryKey = 'IdNivel';
    protected $fillable = ['IdNivel', 'Nivel'];

    public function cabmses(){
        return $this->hasMany(RmCabms::class,'Nivel','IdNivel');
    }

}
