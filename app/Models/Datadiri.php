<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datadiri extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $table = 'datadiri';
    protected $fillable = [
        'id', 'nik', 'nama', 'tempat',
        'tgl_lahir', 'jk', 'alamat',
        'kecamatan', 'agama', 'status_perkawinan',
        'pekerjaan', 'foto_ktp', 'foto_akta',
        'pas_foto', 'user_id'
    ];

    public function peserta()
    {
        return $this->hasMany(Peserta::class);
    }
}
