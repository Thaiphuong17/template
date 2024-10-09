<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Trang chủ', 'slug' => 'trang-chu', 'status' => 1, 'show_at_nav' => 1],
            ['name' => 'Thể thao', 'slug' => 'the-thao', 'status' => 1, 'show_at_nav' => 1],
            ['name' => 'Giải trí', 'slug' => 'giai-tri', 'status' => 1, 'show_at_nav' => 1],
            ['name' => 'Kinh doanh', 'slug' => 'kinh-doanh', 'status' => 1, 'show_at_nav' => 1],
            ['name' => 'Bất động sản', 'slug' => 'bat-dong-san', 'status' => 1, 'show_at_nav' => 1],
        ]);
    }
}
