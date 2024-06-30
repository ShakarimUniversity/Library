<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicationsDataCategory extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title_kz',
        'title_ru',
        'title_en',
    ];

    public function publications(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PublicationsData::class,'category_id','id');
    }
}
