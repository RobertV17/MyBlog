<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('author')->insert([
            'name' => 'Full Stack Developer',
            'info' => 'Hey welcome to my Blog!!! I am developer',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
