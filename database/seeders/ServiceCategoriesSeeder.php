<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('service_categories')->insert(
            [
                'name' => Str::random(10),
                'slug' => 'lorem-ipsum-dolor-seit',
                "image" => "https://cdn.pixabay.com/photo/2022/03/23/21/27/road-7087957_960_720.jpg"
            ],
            [
                'name' => Str::random(10),
                'slug' => 'lorem-ipsum-dolor-seit',
                "image" => "https://cdn.pixabay.com/photo/2022/03/23/21/27/road-7087957_960_720.jpg"
            ]
        );
    }
}
