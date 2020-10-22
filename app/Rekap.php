<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    protected $fillable = ['indikator_id','pilihan','penjelasan','nilai'];

    public function indikators()
    {
        return $this->hasOne(Indikator::class);
    }
}

