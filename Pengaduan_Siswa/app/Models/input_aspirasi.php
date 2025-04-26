<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class input_aspirasi extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function aspirasi()
    {
        return $this->belongsTo(Aspirasi::class, 'id_aspirasi');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis');
    }
}
