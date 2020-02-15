<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i < 120; $i++){
            DB::table('comment')->insert([
                'art_id' => 1,
                'author' => 'Nick Will',
                'email' => 'nicke@gmail.com',
                'text' => 'Great Article bro!!!',
                'created_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
