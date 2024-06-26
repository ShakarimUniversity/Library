<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCover extends Model
{
    use HasFactory;

    protected $fillable = ['image','title','description'];

    public function getImage()
    {
        return '/storage/' . $this->image;
    }
}
