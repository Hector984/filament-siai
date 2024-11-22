<?php

namespace App\Models\Catalogos;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class SsUnidadRespons extends Model
{
    protected $table = "ssunidad_respons";

    public $timestamps = true;
    protected $primaryKey = 'Ur';
    protected $fillable = ['Ur', 'Clave', 'Descripcion','ln_responsable','sn_activacion','dt_inicio_inventario','dt_fin_inventario'];

    public function almacenesUr(){
        return $this->hasMany(RmAlmacen::class,'Ur');
    }

    public function unidadEjecutsUr(){
        return $this->hasMany(SsUnidadEjecut::class,'Ur','Ur');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
