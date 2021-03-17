<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 1. Soft Delete

class Product extends Model
{
    use HasFactory;
    use SoftDeletes; // 2. Soft Delete
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */

    protected $fillable = [
        'name', 'detail'
    ];
   	
    // 3. Soft Delete
    protected $table = "products";
    protected $dates = ['deleted_at'];

}
