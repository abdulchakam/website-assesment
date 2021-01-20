<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    protected $fillable = ['indikator_id','user_id','domain_id','aspek_id','pilihan','penjelasan','nilai'];

    public function indikator()
    {
        return $this->belongsTo(Indikator::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function aspek()
    {
        return $this->belongsTo(Aspek::class);
    }
}

