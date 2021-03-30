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
        'npsn', 'name'
    ];
    protected $table = "perting";

    public function jurusan()
    {
        return $this->hasMany(Jurusan::class);
    }
}
