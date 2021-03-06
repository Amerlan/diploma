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
        // Role comes before User seeder here.
        $this->call(RoleTableSeeder::class);
        // User seeder will use the roles above created.
        $this->call(UserTableSeeder::class);
        $this->call(DocumentTypeSeeder::class);
        $this->call(DocumentSeeder::class);
        $this->call(DocumentDetailsSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(DocumentRolesSeeder::class);

    }
}
