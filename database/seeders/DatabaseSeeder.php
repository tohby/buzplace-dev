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
        //$this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //DB::table('products')->truncate();
        //factory(App\Products::class, 10)->create();
        //DB::table('news')->truncate();
        //factory(App\News::class, 10)->create();
        DB::table('posts')->truncate();
        factory(App\Posts::class, 10)->create();
    }
}
