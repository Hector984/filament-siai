<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Instrumental\RmCImovimientos;
use App\Models\Instrumental\RmCInstrumental;
use App\Models\Instrumental\RmDInstrumental;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RmAlmacen extends Model
{
    use HasFactory;

    protected $table = "rm_almacenes";
    public $timestamps = true;
    protected $primaryKey = 'Almacen';
    protected $keyType = 'string';
    protected $fillable = ['Almacen','Cuenta', 'Descripcion','Almacenista','Puesto_Alm','Direccion','Telefono','Email','Responsable_C','Puesto_Resp_C','Responsable_I','Puesto_Resp_I','Ur','Ue','Accesoif'];

    public function ur(): BelongsTo
    {
        return $this->belongsTo(SsUnidadRespons::class, 'Ur','Ur');
    }

    public function ue(): BelongsTo
    {
        return $this->belongsTo(SsUnidadEjecut::class,'Ue','Ue');
    }

    // public function almacenesDocumentos(){
    //     return $this->hasMany(RmCInstrumental::class,'Id_Almacen');
    // }

    // public function almacenUsuarios(){
    //     return $this->hasMany(User::class,'cve_almacen','Almacen');
    // }

    // public function cIMovimientos()
    // {
    //     return $this->hasMany(RmCImovimientos::class, 'Id_Almacen_O', 'Almacen');
    // }

    // public function dInstrumental()
    // {
    //     return $this->hasMany(RmDInstrumental::class, 'Id_Almacen', 'Almacen');
    // }

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'Dependencia', 'id_dependencia');
    }

}
