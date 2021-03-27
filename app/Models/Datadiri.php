<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Datadiri extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'datadiri';

    protected $fillable = ['nik', 'nama', 'tempat', 'tgl_lahir', 'jk', 'alamat', 'kecamatan', 'agama', 'status_perkawinan', 'pekerjaan', 'foto_ktp', 'user_id'];

    // public function User(){
    //     return $this->hasMany(User::class);
    // }
}
