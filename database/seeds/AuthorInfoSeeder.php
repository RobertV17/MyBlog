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
            'name' => 'Джон Доу',
            'info' => 'Джон Доу - автор, философ и просто хороший мальчик.',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
