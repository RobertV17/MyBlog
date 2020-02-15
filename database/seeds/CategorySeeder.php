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
        for($i = 0; $i<30; $i++) {
            DB::table('category')->insert([
                'title' => 'ИТ',
                'created_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
