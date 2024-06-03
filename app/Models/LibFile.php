<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibFile extends Model
{
    use HasFactory;

    protected $table='lib_jdownloads_files';
    protected $primaryKey = 'file_id';

    public function getFile(){
        return '/storage/jdownloads/'.$this->category->cat_dir.'/'.$this->url_download;
    }

    public function category()
    {
        return $this->belongsTo(CategoryLibFile::class,'cat_id','cat_id');
    }

    public function directory(){

    }
}
