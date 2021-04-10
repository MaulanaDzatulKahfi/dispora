<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kk extends Model
{
    use HasFactory;

    protected $table = 'kk';
    public $incrementing = false;
    protected $fillable = ['id', 'no_kk', 'foto_kk', 'user_id'];

    public function kk()
    {
        return $this->hasMany(Peserta::class);
    }
}
