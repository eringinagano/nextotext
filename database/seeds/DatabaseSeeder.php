<?php

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
        $this->call(CategoriesTableSeeder::class);
        $this->call(TextbookStatesTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(UniversitiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TextbooksTableSeeder::class);
    }
}
