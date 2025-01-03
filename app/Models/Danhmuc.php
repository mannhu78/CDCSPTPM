<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'slug',
        'order',
        'parent_id',
        'status'
    ];
}