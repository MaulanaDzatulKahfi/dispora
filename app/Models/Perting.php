<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 1. Soft Delete

class Perting extends Model
{
    use HasFactory;
    use SoftDeletes; // 2. Soft Delete
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'npsn', 'name'
    ];

    // 3. Soft Delete
    protected $table = "perting";
    protected $dates = ['deleted_at'];

}
