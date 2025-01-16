<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    

    protected $fillable = ['maPel', 'pengajar','Kelas'];
    protected $table = 'pengajars';

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'maPel_id');
    }
}
