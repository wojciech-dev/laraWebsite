<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

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
                'slug' => 'centuries, but also the leap into electronic typesetting, remaining essentially unchanged',
                "image" => "70ghjghjg.jpg"
            ],
        );
    }
}
