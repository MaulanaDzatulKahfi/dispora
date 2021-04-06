<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';
    protected $fillable = ['name', 'fakultas_id', 'perting_id'];

    public function perting()
    {
        return $this->belongsTo(Perting::class);
    }
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
    public function peserta()
    {
        return $this->hasMany(Peserta::class);
    }
}
