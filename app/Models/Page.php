<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_kz',
        'title_ru',
        'content_kz',
        'content_ru',
        'slug',
        'menu_id',
        'parent_id',
        'active',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    public function parent(){
        return $this->hasOne(Page::class,'id','parent_id');
    }

    public function menu(){
        return $this->hasOne(Menu::class,'id','menu_id');
    }

    public function pageLists()
    {
        return $this->hasMany(PageList::class);
    }
}
