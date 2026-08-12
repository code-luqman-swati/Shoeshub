<?php

namespace App\View\Composers;

use App\Models\Setting;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\View\View;

class SettingComposer
{
    public function compose(View $view)
    {
        $setting = Setting::first();

        $categories = Category::whereNull('parent_id')
            ->where('status', 1)
            ->orderBy('name')
            ->get();

        $brands = Brand::orderBy('name')->get();

        $view->with([
            'setting' => $setting,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }
}