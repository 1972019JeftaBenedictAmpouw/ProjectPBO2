<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['maPel', 'nilai', 'kelas', 'name'];

    protected $table = 'nilai';

    public function guru()
    {
        return $this->belongsTo(User::class, 'id_Guru', 'id');
    }
}
