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
        $categories = ['Айти', 'Путешевствия', 'Мысли', 'Еда', 'Фитнес', 'Здоровье', 'Финансы'];

        for($i = 0; $i<6; $i++) {
            DB::table('category')->insert([
                'title' => $categories[$i],
                'created_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
