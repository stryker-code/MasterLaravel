<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([PhoneSeeder::class]);
        $this->call([TaskSeeder::class]);
        $this->call([TodoListSeeder::class]);
        $this->call([RegionSeeder::class]);
        $this->call([StoreSeeder::class]);
    }
}
