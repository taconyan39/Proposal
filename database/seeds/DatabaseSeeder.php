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
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(IdeasTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        // $this->call(ReviewsLocalTableSeeder::class);
        // $this->call(IdeasLocalTableSeeder::class);
        $this->call(UserReactionsLocalTableSeeder::class);

    }
}
