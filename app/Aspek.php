<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspek extends Model
{
    protected $fillable = ['nama_aspek', 'ket_aspek'];

    public function Indikators()
    {
        return $this->hasMany(Indikator::class);
    }
}
