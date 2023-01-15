<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $category = [
            [
                'url' => 'splavy',
                'title' => 'Сплавы',
            ],
            [
                'url' => 'pohody',
                'title' => 'Походы',
            ],
            [
                'url' => 'konnye-pohody',
                'title' => 'Конные походы',
            ],
            [
                'url' => 'kayaking',
                'title' => 'Каякинг',
            ],
            [
                'url' => 'gornolyzhnye-tury-iz-tyumeni',
                'title' => 'Горнолыжные выезды',
            ],
            [
                'url' => 'poleznoe',
                'title' => 'Полезное',
            ],
            [
                'url' => 'proshedshie',
                'title' => 'Прошедшие',
            ],
        ];
        foreach ($category as $value) {
            DB::table('category')->insert($value);
        }
        
    }
}
