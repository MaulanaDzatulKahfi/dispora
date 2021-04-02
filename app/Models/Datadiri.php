<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Datadiri extends Model
{
    use HasFactory;
    protected $table = 'datadiri';
    protected $fillable = ['nik', 'nama', 'tempat', 'tgl_lahir', 'jk', 'alamat', 'agama', 'status_perkawinan', 'pekerjaan', 'foto_ktp', 'foto_akta', 'user_id', 'kecamatan_id'];
    // protected $dates = ['deleted_at'];
}
