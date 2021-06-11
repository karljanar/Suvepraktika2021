<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrameworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('frameworks')->insert([
            'framework_name' => "Drupal",
            'new_framework_version' => "0"
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "Wordpress",
            'new_framework_version' => "0"
        ]);
    }
}
