<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kk extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'kk';
    protected $fillable = ['no_kk', 'foto_kk', 'user_id'];
}
