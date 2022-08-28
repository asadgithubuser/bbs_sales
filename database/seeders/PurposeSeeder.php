<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('application_purposes')->insert([
            
            'id' => 1,
            'name_en' => 'Research',
            'name_bn' => 'Research',
            'status' => '1',
            'ordering' => '1',

        ]);
        DB::table('application_purposes')->insert([
            
            'id' => 2,
            'name_en' => 'Educational',
            'name_bn' => 'Educational',
            'status' => '1',
            'ordering' => '1',

        ]);
        DB::table('application_purposes')->insert([
            
            'id' => 3,
            'name_en' => 'Business',
            'name_bn' => 'Business',
            'status' => '1',
            'ordering' => '1',

        ]);
        DB::table('application_purposes')->insert([
            
            'id' => 100,
            'name_en' => 'Others',
            'name_bn' => 'Others',
            'status' => '1',
            'ordering' => '1',

        ]);
        
    }
}
