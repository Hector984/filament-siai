<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catalogos\RmAlmacen;
use App\Models\Catalogos\RmInmueble;
use App\Models\Catalogos\RmNivel;
use App\Models\Catalogos\RmSeccion;

class RmPropInmueble extends Model
{
    use HasFactory;
    protected $table = "rm_propinmuebles";
    protected $primaryKey = 'Id_Propinmueble';
    public $timestamps = true;
    protected $fillable = ['Id_Propinmueble', 'Almacen', 'IdInmueble', 'IdNivel', 'Id_Seccion', 'Resp_Nivel', 'Resp_Seccion'];

    public function almacen(){
        return $this->belongsTo(RmAlmacen::class,'Almacen','Almacen');
    }

    public function inmueble(){
        return $this->belongsTo(RmInmueble::class,'IdInmueble','IdInmueble');
    }

    public function nivel(){
        return $this->belongsTo(RmNivel::class,'IdNivel','IdNivel');
    }

    public function seccion(){
        return $this->belongsTo(RmSeccion::class,'Id_Seccion','Id_Seccion');
    }

    public function scopeInmueble($query){
        $query->addSelect([
            'Inmueble' => RmInmueble::select('Inmueble')
            ->whereColumn('IdInmueble', 'rm_propinmuebles.IdInmueble')
            ->limit(1)
        ]);
    }


}
