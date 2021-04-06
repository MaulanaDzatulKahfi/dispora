<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;
    protected $table = 'fakultas';
    protected $fillable = ['name', 'status', 'perting_id'];

    public function perting()
    {
        return $this->belongsTo(Perting::class);
    }
    public function jurusan()
    {
        return $this->hasMany(Jurusan::class);
    }
    public function peserta()
    {
        return $this->hasMany(Peserta::class);
    }
}
