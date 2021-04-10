<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasi';
    protected $fillable = ['kode', 'nim', 'ipk','semester', 'rangking', 'lomba','tingkat', 'lembaga', 'hafal', 'juz1', 'juz2', 'jenis', 'foto', 'skor', 'user_id'];

    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'prestasi_kode', 'kode');
    }
}
