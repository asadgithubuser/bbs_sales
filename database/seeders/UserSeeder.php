<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'username' => 'superadmin',
            'first_name' => 'super',
            'middle_name' => 'super',
            'last_name' => 'admin',
            'status' => true,
            'present_address'=>'house 36 road 6 kamarpara turag',
            'mobile'=>'01712345678',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678'),
            'created_by' => 1

        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'username' => 'admin',
            'first_name' => 'John',
            'middle_name' => 'super',
            'last_name' => 'Doe',
            'office_id'=> 1,
            'level_id' => 1,
            'status' => true,
            'designation_id' =>'7',
            'present_address'=>'house 45 road 5 Banasree',
            'mobile'=>'01312345678',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'created_by' => 1

        ]);

        DB::table('users')->insert([
            'role_id' => 3,
            'username' => 'white',
            'first_name' => 'Snow',
            'middle_name' => 'super',
            'last_name' => 'white',
            'present_address'=>'house 45 road 5 Badda',
            'status' => true,
            'designation_id' =>'7',
            'office_id'=> 1,
            'level_id' => 1,
            'email' => 'e_service_admin@gmail.com',
            'password' => Hash::make('12345678'),
            'created_by' => 1
        ]);

        DB::table('users')->insert([
            'role_id' => 4,
            'username' => 'johnny',
            'first_name' => 'Johnny',
            'middle_name' => 'deep',
            'last_name' => 'depp',
            'designation_id' =>'6',
            'level_id' => 1,

            'present_address'=>'house 45 road 5 Uttara',
            'status' => true,
            'office_id'=> 1,

            'email' => 'e_service_observer@gmail.com',
            'password' => Hash::make('12345678'),
            'created_by' => 1
        ]);

        DB::table('users')->insert([
            'role_id' => 5,
            'username' => 'amber',
            'first_name' => 'Amber',
            'middle_name' => 'Heard',
            'last_name' => 'Heard',
            'present_address'=>'house 45 road 5 Mirpur',
            'status' => true,
            'office_id'=> 1,
            'designation_id' =>'5',
            'level_id' => 1,
            
            'email' => 'e_service_observer1@gmail.com',
            'password' => Hash::make('12345678'),
            'created_by' => 1
        ]);

        DB::table('users')->insert([
            'role_id' => 6,
            'username' => 'hasan',
            'first_name' => 'Amber',
            'middle_name' => 'Heard',
            'last_name' => 'Heard',
            'designation_id' =>'4',
            'present_address'=>'house 45 road 5 Mirpur',
            'status' => true,
            'office_id'=> 1,
            'level_id' => 1,
            
            'email' => 'e_service_operator@gmail.com',
            'password' => Hash::make('12345678'),
            'created_by' => 1
        ]);

        DB::table('users')->insert([
            'role_id' => 7,
            'username' => 'raiyan',
            'first_name' => 'raiyan',
            'middle_name' => 'Bhogle',
            'last_name' => 'Carter',
            'designation_id' =>'3',
            'present_address'=>'house 45 road 5 Uttara',
            'status' => true,
            'level_id' => 1,
            'office_id'=> 1,
            'email' => 'e_service_operator1@gmail.com',
            'password' => Hash::make('12345678'),
            'created_by' => 1
        ]);

        DB::table('users')->insert([
            'role_id' => 8,
            'username' => 'helena',
            'first_name' => 'Helena',
            'middle_name' => 'Bonham',
            'last_name' => 'Carter',
            'designation_id' =>'2',
            'present_address'=>'house 45 road 5 Uttara',
            'status' => true,
            'level_id' => 1,
            'office_id'=> 1,
            'email' => 'e_service_operator2@gmail.com',
            'password' => Hash::make('12345678'),
            'created_by' => 1
        ]);

        DB::table('users')->insert([
            'role_id' => 9,
            'username' => 'halima',
            'first_name' => 'halima',
            'middle_name' => 'Bonham',
            'last_name' => 'Carter',
            'designation_id' =>'1',
            'present_address'=>'house 45 road 5 Uttara',
            'status' => true,
            'level_id' => 1,
            'office_id'=> 1,
            'email' => 'e_service_operator3@gmail.com',
            'password' => Hash::make('12345678'),
            'created_by' => 1
        ]);

        

        DB::table('users')->insert([
            'role_id' => 10,
            'username' => 'helsynki',
            'first_name' => 'helsynki',
            'middle_name' => 'Bonham',
            'last_name' => 'Carter',
            'present_address'=>'house 45 road 5 Uttara',
            'status' => true,
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
            'created_by' => 1
        ]);

        DB::table('users')->insert([
            'role_id' => 11,
            'username' => 'Halim',
            'first_name' => 'Md',
            'middle_name' => 'Halim',
            'last_name' => 'Sheikh',
            'present_address'=>'house 45 road 5 Uttara',
            'status' => true,
            'email' => 'storekeeper@gmail.com',
            'password' => Hash::make('12345678'),
            'created_by' => 1
        ]);
    }
}
