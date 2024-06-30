<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationsData extends Model
{
    protected $fillable = [
        'title_kz',
        'title_ru',
        'title_en',
        'description_kz',
        'description_ru',
        'description_en',
        'logo',
        'active',
        'category_id'
    ];

    public function getLogo()
    {
        return '/storage/' . $this->logo;
    }
}
