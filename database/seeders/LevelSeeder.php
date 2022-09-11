<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([            
            'name_en'=> 'HQ',
            'name_bn'=> 'হেড কোয়ার্টার'
        ]);

        DB::table('levels')->insert([            
            'name_en'=> 'Division Office',
            'name_bn'=> 'বিভাগীয় কার্যালয়'
        ]);

        DB::table('levels')->insert([            
            'name_en'=> 'District Office',
            'name_bn'=> 'জেলা কার্যালয়'
        ]);

        DB::table('levels')->insert([            
            'name_en'=> 'Upazila Office',
            'name_bn'=> 'উপজেলা কার্যালয়'
        ]);

    }
}
