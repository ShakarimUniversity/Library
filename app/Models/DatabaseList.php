<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatabaseList extends Model
{
    protected $fillable =[
       'title',
       'description_kz',
       'description_ru',
       'description_en',
       'initial',
       'link'
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (!empty($model->title)) {
                $model->initial = strtoupper(substr($model->title, 0, 1));
            }
        });
    }
}
