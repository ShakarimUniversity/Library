<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model
{
    use HasSlug;

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

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title_kz')
            ->saveSlugsTo('slug');
    }

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
