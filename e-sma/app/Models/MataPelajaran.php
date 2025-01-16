<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $fillable = ['maPel'];
    protected $table = 'mata_pelajaran';

    public function pengajars()
    {
        return $this->hasMany(Pengajar::class, 'maPel_id');
    }
}
