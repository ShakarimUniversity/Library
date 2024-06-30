<?php

namespace App\View\Components;

use App\Models\DatabaseList;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $metaTitle,
        public string $metaDescription,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $nav = Cache::remember('menu',120,function(){
            return \App\Models\Menu::with(['category','children'=>function($q){
                return $q->with('page');
            },'page'])
            ->where(['active'=>true,'category_id'=>1,'parent_id'=>NULL])->get();
        });

        $sidebarNav = Cache::remember('sidebarNav',120,function(){
            return \App\Models\Menu::with(['category','children','page'])->where(['active'=>true,'category_id'=>2])->where('parent_id','=',NULL)->get();
        });

        $partners = Cache::remember('partners',120,function(){
            return \App\Models\Partner::all();
        });

        return view('components.app-layout',compact(['nav','sidebarNav','partners']));
    }
}
