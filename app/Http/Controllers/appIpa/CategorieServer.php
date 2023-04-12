<?php

namespace App\Http\Controllers\appIpa;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gig;
use App\Models\Subcategory;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithPagination;

class CategorieServer extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function categories()
    {
        $categorys = Category::where('is_visible', true)->inRandomOrder()->get();
        foreach ($categorys as $category) {
            $catigores[] = [
                "id" => $category->id,
                "name" => $category->name,
                "image" => $category->image->uid . '.' . $category->image->file_extension,
                "slug" => $category->slug,
                "description" => $category->description,
                "icon" => $category->icon->uid . '.' . $category->icon->file_extension,

            ];
        }
        return $catigores;
    }

    public function subcategories()
    {
        $subcatgory = Subcategory::query()->orderBy('name', 'ASC')->get();
        return $subcatgory;
    }
}
