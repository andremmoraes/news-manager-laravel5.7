<?php

use App\NewsList;
use Illuminate\Database\Seeder;

class NewsListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(NewsList::class, 20)->create();
    }
}
