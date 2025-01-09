<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name_kz',
        'name_ru',
    ];
}
