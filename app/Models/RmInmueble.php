<?php

namespace App\Models\Catalogos;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RmInmueble extends Model
{
    use HasFactory;
    protected $table = "rm_inmueble";
    public $timestamps = true;
    protected $primaryKey = 'IdInmueble';
    protected $fillable = [
        'IdInmueble',
        'Inmueble',
        'Direccion',
        'Telefono',
        'ind_central',
        'Id_Almacen',
        'ln_nombre_primer_responsable',
        'ln_nombre_segundo_responsable',
    ];

    public function almacen(){
        return $this->belongsTo(RmAlmacen::class,'Id_Almacen','Almacen');
    }

    public function inmuebleUsuario(){
        return $this->belongsTo(User::class,'Responsable','id');
    }

    public function pisoResponsableUno()
    {
        return $this->belongsTo(RmNivel::class, 'fk01_piso_primer_responsable', 'IdNivel');
    }

    public function pisoResponsableDos()
    {
        return $this->belongsTo(RmNivel::class, 'fk02_piso_segundo_responsable', 'IdNivel');
    }


}
