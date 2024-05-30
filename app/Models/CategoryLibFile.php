<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryLibFile extends Model
{
    use HasFactory;

    protected $table = 'lib_jdownloads_cats';
    protected $primaryKey = 'cat_id';

    public function files(){
        return $this->hasMany(LibFile::class,'cat_id','cat_id');
    }

    public function children(){
        return $this->hasMany(CategoryLibFile::class,'parent_id','cat_id');
    }
}
