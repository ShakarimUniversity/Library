<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
       'title_kz',
       'title_ru',
       'parent_id',
       'link',
       'sort',
       'category_id',
       'active',
    ];

    public function category(){
        return $this->hasOne(MenuCategory::class,'id','category_id');
    }

    public function page(){
        return $this->hasOne(Page::class,'menu_id','id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }

}
