<?php

use Illuminate\Database\Seeder;

class TextbooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $textbooks = factory(App\Textbook::class, 100)->create();
    }
}
