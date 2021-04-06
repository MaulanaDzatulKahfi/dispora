<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'peserta';
    protected $fillable = ['asal_sekolah', 'lulus_tahun', 'perting_id', 'fakultas_id', 'jurusan_id', 'datadiri_id', 'user_id'];

    public function perting()
    {
        return $this->belongsTo(Perting::class);
    }
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function datadiri()
    {
        return $this->belongsTo(Datadiri::class);
    }
}
