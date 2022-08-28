<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ServicesItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_items')->insert([
            
            'service_id' => '1',
            'data_type' => '2',
            'item_name_en' => 'Census Publication 2018',
            'item_name_bn' => 'আদমশুমারি প্রকাশনা ২০১৮',
            'price' => '100',
            'description' => 'Bangladesh is the eighth-most populated country in the world with almost 2.2% of the worlds population. The population is estimated by the 2019 revision of the World Population Prospects to have stood at 161,376,708 in 2018......',
            'status' => '1',
            'ordering' => '1',
            'barcode' => 'bbs00000001',
            'created_by' => '1',

        ]);

        DB::table('service_items')->insert([
            
            'service_id' => '2',
            'data_type' => '1',
            'item_name_en' => 'Agricultural Census 2019',
            'item_name_bn' => 'কৃষি শুমারি ২০১৯',
            'price' => '200',
            'description' => 'The Agriculture Census 2019, the sixth in its series, is an agricultural statistical venture of Bangladesh Bureau of Statistics (BBS). Not only has Bangladesh recorded persistent economic growth of 7.86 to 8.13%, but it has also achieved a substantial reduction in poverty rate.......',
            'status' => '1',
            'ordering' => '2',
            'barcode' => 'bbs00000002',
            'created_by' => '1',

        ]);

        DB::table('service_items')->insert([
            
            'service_id' => '3',
            'data_type' => '2',
            'item_name_en' => 'Citizen Certificate',
            'item_name_bn' => 'নাগরিক সার্টিফিকেট',
            'price' => '300',
            'description' => 'Through this service, employers can check the validity of the certificate provided by a prospective Bengali employee before applying for the work permit....',
            'status' => '1',
            'ordering' => '3',
            'barcode' => 'bbs00000003',
            'created_by' => '1',

        ]);

    }
}
