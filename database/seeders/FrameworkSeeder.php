<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            'automatic_version_control' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "Drupal 8",
            'new_framework_version' => "0",
            'automatic_version_control' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "Drupal 7",
            'new_framework_version' => "0",
            'automatic_version_control' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "Wordpress",
            'new_framework_version' => "0",
            'automatic_version_control' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "H5P",
            'new_framework_version' => "0",
            'automatic_version_control' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "Composer",
            'new_framework_version' => "0",
            'automatic_version_control' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "Yii 2.0",
            'new_framework_version' => "0",
            'automatic_version_control' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "Yii 1.1",
            'new_framework_version' => "0",
            'automatic_version_control' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "October CMS 2",
            'new_framework_version' => "0",
            'automatic_version_control' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "October CMS 1",
            'new_framework_version' => "0",
            'automatic_version_control' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "LimeSurvey 5",
            'new_framework_version' => "0",
            'automatic_version_control' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::table('frameworks')->insert([
            'framework_name' => "LimeSurvey 3",
            'new_framework_version' => "0",
            'automatic_version_control' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
    }
}
