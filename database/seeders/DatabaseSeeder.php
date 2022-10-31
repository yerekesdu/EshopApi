<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Good;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'bike']);
        Category::create(['name' => 'smartphones']);
        Category::create(['name' => 'laptops']);

        Good::create([
            'name' => 'first',
            'description' => 'asd',
            'slug' => 'asd',
            'category_id' => '1',
            'price' => '240'
        ]);
        Good::create([
            'name' => 'second',
            'description' => 'fgh',
            'slug' => 'fgh',
            'category_id' => '2',
            'price' => '200'
        ]);
        Good::create([
            'name' => 'third',
            'description' => 'cvb',
            'slug' => 'cvb',
            'category_id' => '3',
            'price' => '100'
        ]);
    }
}
