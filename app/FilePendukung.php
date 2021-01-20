<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilePendukung extends Model
{
    protected $table = 'files';
    protected $fillable =['file_name','indikator_id','user_id'];

    public function indikator()
    {
        return $this->hasOne(Indikator::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
