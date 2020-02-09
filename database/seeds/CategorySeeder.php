<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'title' => 'ИТ',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
