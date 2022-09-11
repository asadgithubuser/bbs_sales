<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ReceivingModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('receiving_modes')->insert([
            
            'name_bn' => 'ফিজিক্যাল - হার্ড কপি',
            'name_en' => 'Physical - Hard Copy',
            'description' => 'Only for Publications & Certificates',
            'status' => '1',
            'created_by' => '1',
        ]);
        
        DB::table('receiving_modes')->insert([
            
            'name_bn' => 'ফিজিক্যাল - কুরিয়ার',
            'name_en' => 'Physical - Courier',
            'description' => 'Get Hard Copy Via Courier',
            'status' => '1',
            'created_by' => '1',
        ]);

        DB::table('receiving_modes')->insert([
            
            'name_bn' => 'ফিজিক্যাল আইটেম',
            'name_en' => 'Physical - CD/DVD/Flash Drive',
            'description' => 'Users Own',
            'status' => '1',
            'created_by' => '1',
        ]);
        
        DB::table('receiving_modes')->insert([
            
            'name_bn' => 'লিংক',
            'name_en' => 'Download Link',
            'description' => '',
            'status' => '1',
            'created_by' => '1',
        ]);
    }
}
