<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $fillable = ['maPel', 'maPel_id'];
    protected $table = 'mata_pelajaran';
}
