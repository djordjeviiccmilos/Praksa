<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create([
            'names' => 'Sport',
            'description' => 'This is sport category',
            'created_by' => '15',
            'updated_by' => '15'
        ]);

        Category::create([
            'names' => 'Science',
            'description' => 'This is science category',
            'created_by' => '15',
            'updated_by' => '15'
        ]);
    }
}
