<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article')->insert([
            'cat_id' => 1,
            'title' => 'Title 1',
            'description' => 'Wow its great art',
            'text' => 'Wow its great art Wow its great art',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
