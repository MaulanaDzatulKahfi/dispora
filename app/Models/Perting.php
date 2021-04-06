<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Perting extends Model
{
    use HasFactory;
    // use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'kode_pt', 'name', 'status_pt', 'tgl_berdiri', 'sk_pt', 'tgl_sk_pt', 'alamat', 'kelurahan', 'kecamatan', 'kota', 'provinsi', 'kode_pos', 'tlp', 'email', 'website'
    ];
    protected $table = "perting";

    public function jurusan()
    {
        return $this->hasMany(Jurusan::class);
    }
    public function fakultas()
    {
        return $this->hasMany(Fakultas::class);
    }
    public function peserta()
    {
        return $this->hasMany(Peserta::class);
    }
}
