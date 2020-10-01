<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = ['nama_domain','ket_domain'];

    public function indikators()
    {
        return $this->hasMany(Indikator::class);
    }
}
