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
            'name' => 'Jhonny Cash',
            'info' => 'vvvv',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
