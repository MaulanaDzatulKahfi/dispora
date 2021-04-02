<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ktp_ortu extends Model
{
    use HasFactory;

    protected $table = "ktp_ortu";
    protected $fillable = ['nik', 'name', 'foto_ktp_ortu', 'user_id'];
}
