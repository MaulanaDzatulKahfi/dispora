<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kolektif extends Model
{
    use HasFactory;
    protected $table = 'kolektif';
    protected $fillable = ['nip', 'name', 'jabatan', 'user_id'];
}
