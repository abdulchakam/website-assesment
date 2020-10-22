<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Indikator extends Model
{
    protected $fillable =['nama_indikator','ket_indikator','domain_id','aspek_id','pertanyaan',
                            'level0',
                            'level1',
                            'level2',
                            'level3',
                            'level4',
                            'level5',
                            'petunjuk',
                        ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
    public function aspek()
    {
        return $this->belongsTo(Aspek::class);
    }
    public function rekap()
    {
        return $this->hasOne(Rekap::class);
    }

    public function files()
    {
        return $this->hasMany(FilePendukung::class);
    }
}

