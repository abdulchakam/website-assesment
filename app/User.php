<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\FilePendukung;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'name', 'email', 'password', 'username', 'role', 'avatar','nip','unit_kerja'
        ,'jabatan','no_hp','instansi','instansi_induk','alm_instansi','telp_instansi'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function indikators()
    {
        return $this->belongsToMany(Indikator::class);
    }

    public function rekaps()
    {
        return $this->hasMany(Rekap::class);
    }

    public function files()
    {
        return $this->hasMany(FilePendukung::class);
    }
}
