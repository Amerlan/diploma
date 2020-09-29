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
        // \App\Models\DefaultUser::factory(10)->create();
        // Role comes before DefaultUser seeder here.
        $this->call(RoleTableSeeder::class);
        // DefaultUser seeder will use the roles above created.
        $this->call(UserTableSeeder::class);
        $this->call(DocumentTypeSeeder::class);
        $this->call(DocumentSeeder::class);
    }
}
