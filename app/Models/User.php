<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Catalogos\RmAlmacen;
use App\Models\Catalogos\SsUnidadEjecut;
use App\Models\Catalogos\SsUnidadRespons;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'idur',
        'idue',
        'nempleado',
        'cve_almacen',
        'current_team_id',
        'profile_photo_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function UnidadResponsable(){
        return $this->belongsTo(SsUnidadRespons::class, 'idur', 'Ur');
    }

    public function ue(): BelongsTo
    {
        return $this->belongsTo(SsUnidadEjecut::class, 'idue', 'Ue');
    }

    public function almacen(): BelongsTo{
        return $this->belongsTo(RmAlmacen::class,'cve_almacen','Almacen');
    }

}
