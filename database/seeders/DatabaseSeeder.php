<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(DesignationSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(OfficeSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(ReceivingModeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ServicesItemSeeder::class);
        $this->call(PurposeSeeder::class);
    }
}
