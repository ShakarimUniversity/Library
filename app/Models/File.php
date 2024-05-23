<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    const FILES_PATH = 'files';

    protected $fillable = [
      'title',
      'filename'
    ];
}

