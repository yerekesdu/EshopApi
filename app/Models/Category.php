<?php

namespace App\Models;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static function tree(){

        $allCategories = Category::get();

        $rootCategories = $allCategories->whereNull('category_id');

        self::formatTree($rootCategories, $allCategories);

        return $rootCategories;
    }

    private static function formatTree($categories, $allCategories){
        foreach ($categories as $category){
            $category->children = $allCategories->where('category_id', $category->id)->values();

            if($category->children->isNotEmpty()){
                self::formatTree($category->children, $allCategories);
            }
        }
    }

    public function goods(){
        return $this->hasMany('Good');
    }
}
