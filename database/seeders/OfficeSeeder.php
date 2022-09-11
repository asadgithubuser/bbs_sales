<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offices')->insert([            
            'level'=> '1',
            'office_code'=> 'bbs01',
            'title_bn'=> 'হেড অফিস',
            'title_en'=> 'Head Office',
            'division_id'=> '3',
            'district_id'=> '13',
            'upazila_id'=> '51',
            'address'=> 'ঢাকা',
            'web_url'=> '',
            'about_info'=> '',
            'phone'=> '0123456789',
            'email'=> '',
            'fax'=> '',
            'status'=> 1,
            'ordering'=> 1,
            'created_by'=> 1,
        ]);

        DB::table('offices')->insert([            
            'level'=> '1',
            'office_code'=> 'bbs02',
            'title_bn'=> 'লোকাল অফিস',
            'title_en'=> 'Local Office',
            'division_id'=> '3',
            'district_id'=> '13',
            'upazila_id'=> '52',
            'address'=> 'ঢাকা',
            'web_url'=> '',
            'about_info'=> '',
            'phone'=> '0123654789',
            'email'=> '',
            'fax'=> '',
            'status'=> 1,
            'ordering'=> 2,
            'created_by'=> 1,
        ]);

        
    }
}
