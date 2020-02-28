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
        for($i = 0; $i < 70; $i++) {
            DB::table('article')->insert([
                'cat_id' => mt_rand(1,6),
                'preview_img' => 'UNwYDEzjv7F84dgQGQUZkojHWTP1JcqCuxXrgR4X.jpeg',
                'title' => 'Очень интересно и смешно, куто живем друзья!',
                'description' => 'description',
                'text' => 'description description',
                'created_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
