<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'pertanyaan';
    public $incrementing = false;
    protected $fillable = ['id', 'pertanyaan1', 'pertanyaan2', 'pertanyaan3', 'no_hp', 'email', 'facebook', 'instagram', 'twitter', 'youtube', 'user_id'];

    public function peserta()
    {
        return $this->hasOne(Peserta::class);
    }
}
