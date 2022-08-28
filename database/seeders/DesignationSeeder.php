<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designations')->insert([
            'level'=>'4',
            'office_id'=>'2',
            'name_en'=>'Assitance Officer (Local)',
            'name_bn'=>'সহকারী অফিসার (লোকাল)',
            'description'=>'Assitance Officer (Local)',
            'created_by'=>'1',
            'status'=>'1',
            'ordering'=>'1',
        ]);

        DB::table('designations')->insert([
            'level'=>'4',
            'office_id'=>'2',
            'name_en'=>'Statistical Officer (Local)',
            'name_bn'=>'পরিসংখ্যানগত অফিসার (লোকাল)',
            'description'=>'Statistical Officer (Local)',
            'created_by'=>'1',
            'status'=>'1',
            'ordering'=>'1',
        ]);

        DB::table('designations')->insert([
            'level'=>'1',
            'office_id'=>'1',
            'name_en'=>'Assitance Officer',
            'name_bn'=>'সহকারী অফিসার',
            'description'=>'Assitance Officer',
            'created_by'=>'1',
            'status'=>'1',
            'ordering'=>'1',
        ]);

        DB::table('designations')->insert([
            'level'=>'1',
            'office_id'=>'1',
            'name_en'=>'Senior Programmer',
            'name_bn'=>'সিনিয়র প্রোগ্রামার',
            'description'=>'Senior Programmer',
            'created_by'=>'1',
            'status'=>'1',
            'ordering'=>'1',
        ]);

        DB::table('designations')->insert([
            'level'=>'1',
            'office_id'=>'1',
            'name_en'=>'Director',
            'name_bn'=>'ডিরেক্টর',
            'description'=>'Director',
            'created_by'=>'1',
            'status'=>'1',
            'ordering'=>'1',
        ]);
        
        DB::table('designations')->insert([
            'level'=>'1',
            'office_id'=>'1',
            'name_en'=>'Deputy Director General',
            'name_bn'=>'সাধারণ ডেপুটি ডিরেক্টর',
            'description'=>'Deputy Director General',
            'created_by'=>'1',
            'status'=>'1',
            'ordering'=>'1',
        ]);

        DB::table('designations')->insert([
            'level'=>'1',
            'office_id'=>'1',
            'name_en'=>'Director General',
            'name_bn'=>'সাধারণ ডিরেক্টর',
            'description'=>'Director General',
            'created_by'=>'1',
            'status'=>'1',
            'ordering'=>'1',
        ]);
        
    }
}
