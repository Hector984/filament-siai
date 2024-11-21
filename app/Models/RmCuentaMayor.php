<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RmCuentaMayor extends Model
{
    use HasFactory;

    protected $table = "rm_cuentas_mayor";
    public $timestamps = true;
    protected $fillable = ['Ctmayor','Cuenta'];
}
