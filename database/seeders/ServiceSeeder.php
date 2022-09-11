<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name_en' => 'Publication Sale Service',
            'name_bn' => 'প্রকাশনা বিক্রয় সেবা',
            'level_id' => '1',
            'office_id' => '1',
            'status' => '1',
            'ordering' => '1',
            'created_by' => '1',
        ]);

        DB::table('services')->insert([
            'name_en' => 'Certificate Sale Service',
            'name_bn' => 'সনদপত্র বিক্রয় পরিষেবা',
            'level_id' => '1',
            'office_id' => '1',
            'status' => '1',
            'ordering' => '2',
            'created_by' => '1',
        ]);

        DB::table('services')->insert([
            'name_en' => 'Data Sale Services',
            'name_bn' => 'ডেটা বিক্রয় পরিষেবা',
            'level_id' => '1',
            'office_id' => '1',
            'status' => '1',
            'ordering' => '3',
            'created_by' => '1',
        ]);
    }
}
