<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'maPel', 
        'waktuMapel',
        'id_Guru',
        'kelas'
    ];

    protected $table = 'jadwal'; 
    public $timestamps = false;

    public function guru()
    {
        return $this->belongsTo(User::class, 'id_Guru', 'id');
    }
}
