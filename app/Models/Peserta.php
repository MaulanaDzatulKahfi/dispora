<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'peserta';
    protected $fillable = ['nisn', 'asal_sekolah', 'lulus_tahun', 'foto', 'foto_ptn', 'status', 'status_mhs', 'total_skor', 'perting_id', 'fakultas_id', 'jurusan_id', 'datadiri_id', 'kk_id', 'prestasi_kode', 'pertanyaan_id', 'user_id'];

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
    public function kk()
    {
        return $this->belongsTo(Kk::class);
    }
    public function prestasi()
    {
        return $this->belongsTo(Prestasi::class, 'prestasi_kode', 'kode');
    }
    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
