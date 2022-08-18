<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'Категория 1',
                'children' => [
                    ['title' => 'Подкатегория 1-1'],
                    ['title' => 'Подкатегория 1-2']
                ]
            ],
            [
                'title' => 'Категория 2',
                'children' => [
                    ['title' => 'Подкатегория 2-1'],
                    ['title' => 'Подкатегория 2-2']
                ]
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
