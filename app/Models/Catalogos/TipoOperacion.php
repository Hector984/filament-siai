<?php

namespace App\Models\Catalogos;

use App\Models\Catalogos\Autorizacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoOperacion extends Model
{
    use HasFactory;
    protected $table = "rm_tipoopera";
    public $timestamps = false;
    protected $fillable = ['Id_To', 'Documento', 'Descripcion', 'Movimiento'];
    protected $primaryKey = "Id_To";

    // public function autorizaciones()
    // {
    //     return $this->hasMany(Autorizacion::class, 'Id_To', 'Id_To');
    // }
}
