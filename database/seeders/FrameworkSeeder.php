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
            'framework_name' => "Drupal 9",
            'new_framework_version' => "0",
            'automatic_version_control' => 1
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "Drupal 8",
            'new_framework_version' => "0",
            'automatic_version_control' => 1
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "Drupal 7",
            'new_framework_version' => "0",
            'automatic_version_control' => 1
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "Wordpress 3",
            'new_framework_version' => "0",
            'automatic_version_control' => 1
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "Wordpress 4",
            'new_framework_version' => "0",
            'automatic_version_control' => 1
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "Wordpress 5",
            'new_framework_version' => "0",
            'automatic_version_control' => 1
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "H5P",
            'new_framework_version' => "0",
            'automatic_version_control' => 1
        ]);
    }
}
