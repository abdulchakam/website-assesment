<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilePendukung extends Model
{
    protected $table = 'files';
    protected $fillable =['file_name','indikator_id','user_id'];

    public function Indikator()
    {
        return $this->hasOne(Indikator::class);
    }
}
