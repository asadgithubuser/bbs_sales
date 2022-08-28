<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name_bn' => 'সুপার অ্যাডমিন',
            'name_en' => 'Super Admin',
            'display_name' => 'Super Admin',
            'status' => 1,
            'ordering' => '1',
            'created_by' => 1

        ]);

        DB::table('roles')->insert([
            'name_bn' => 'অ্যাডমিন',
            'name_en' => 'Admin',
            'display_name' => 'Admin',
            'status' => 1,
            'ordering' => '2',
            'created_by' => 1

        ]);

        DB::table('roles')->insert([
            'name_bn' => 'ই-সার্ভিস অ্যাডমিন',
            'name_en' => 'Director General',
            'display_name' => 'E-Service Administrator',
            'status' => 1,
            'ordering' => '3',
            'created_by' => 1

        ]);

        

        DB::table('roles')->insert([
            'name_bn' => 'ই-সার্ভিস পর্যবেক্ষক',
            'name_en' => 'Deputy Director General',
            'display_name' => 'E-Service Observer',
            'status' => 1,
            'ordering' => '4',
            'created_by' => 1

        ]);

        DB::table('roles')->insert([
            'name_bn' => 'ই-সার্ভিস পর্যবেক্ষক',
            'name_en' => 'Director',
            'display_name' => 'E-Service Observer',
            'status' => 1,
            'ordering' => '5',
            'created_by' => 1

        ]);

        DB::table('roles')->insert([
            'name_bn' => 'ই-সার্ভিস অপারেটর',
            'name_en' => 'Senior Programmer',
            'display_name' => 'E-Service Operator',
            'status' => 1,
            'ordering' => '6',
            'created_by' => 1

        ]);

        DB::table('roles')->insert([
            'name_bn' => 'ই-সার্ভিস অপারেটর',
            'name_en' => 'Assistant Officer',
            'display_name' => 'E-Service Operator',
            'status' => 1,
            'ordering' => '7',
            'created_by' => 1

        ]);

        DB::table('roles')->insert([
            'name_bn' => 'ই-সার্ভিস অপারেটর',
            'name_en' => 'Assistant Officer (Local)',
            'display_name' => 'E-Service Operator',
            'status' => 1,
            'ordering' => '8',
            'created_by' => 1

        ]);

        DB::table('roles')->insert([
            'name_bn' => 'ই-সার্ভিস অপারেটর',
            'name_en' => 'Statistical Officer (Local)',
            'display_name' => 'E-Service Operator',
            'status' => 1,
            'ordering' => '9',
            'created_by' => 1

        ]);

        DB::table('roles')->insert([
            'name_bn' => 'সার্ভিস প্রাপক',
            'name_en' => 'Service Recipient',
            'display_name' => 'Service Recipient',
            'status' => 1,
            'ordering' => '10',
            'created_by' => 1

        ]);

        DB::table('roles')->insert([
            'name_bn' => 'দোকান ব্যবস্থাপক',
            'name_en' => 'Store Manager',
            'display_name' => 'Store Manager',
            'status' => 1,
            'ordering' => '11',
            'created_by' => 1

        ]);

        DB::table('roles')->insert([
            'name_bn' => 'কোর্স সমন্বয়কারী',
            'name_en' => 'Course Coordinator',
            'display_name' => 'Course Coordinator',
            'status' => 1,
            'ordering' => '12',
            'created_by' => 1

        ]);

        DB::table('roles')->insert([
            'name_bn' => 'কোর্স পরিচালক',
            'name_en' => 'Course Director',
            'display_name' => 'Course Director',
            'status' => 1,
            'ordering' => '13',
            'created_by' => 1

        ]);
    }
}
