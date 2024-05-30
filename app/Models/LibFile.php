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
        return '/storage/lib_files/'.$this->url_download;
    }
}
