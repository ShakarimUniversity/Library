<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
       'category_id',
       'book_name',
       'file_name',
       'author',
       'isbn',
    ];

    public function category()
    {
        return $this->belongsTo(BookCategory::class,'category_id');
    }

    public function getBook()
    {
        if ($this->file_name){
            return '/storage/'. $this->file_name;
        }
        return null;
    }
}
