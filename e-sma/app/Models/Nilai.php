<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['maPel', 'nilai', 'nomorInduk', 'Kelas'];

    protected $table = 'nilai';

    public function guru()
    {
        return $this->belongsTo(User::class, 'id_Guru', 'id');
    }
}
