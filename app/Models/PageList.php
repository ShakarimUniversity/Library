<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageList extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title_kz',
        'title_ru',
        'description_kz',
        'description_ru',
        'page_id',
        'image',
        'filename',
    ];

    public function getImage(){
        if($this->image){
            return '/storage/'. $this->image;
        }
        return null;
    }

    public function getFile(){
        if($this->filename){
            return '/storage/'. $this->filename;
        }
        return null;
    }
}
