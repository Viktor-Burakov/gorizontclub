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
            DB::table('categories')->insert($value);
        }

        $posts = [
            [
                'title' => 'post1',
                'url' => 'post1',
                'H1' => 'post1',
            ],
            [
                'title' => 'post2',
                'url' => 'post2',
                'H1' => 'post2',
            ],
            [
                'title' => 'post3',
                'url' => 'post3',
                'H1' => 'post3',
            ],
            [
                'title' => 'post4',
                'url' => 'post4',
                'H1' => 'post4',
            ],

        ];
        foreach ($posts as $value) {
            DB::table('posts')->insert($value);
        }

        $postsDetail = [
            [
                'post_id' => 1,
            ],
            [
                'post_id' => 2,
            ],
            [
                'post_id' => 3,
            ],
            [
                'post_id' => 4,
            ],

        ];

        foreach ($postsDetail as $value) {
            DB::table('post_detail')->insert($value);
        }

        $categoryPost = [
            [
                'post_id' => '1',
                'category_id' => '1',
            ],
            [
                'post_id' => '1',
                'category_id' => '3',
            ],
            [
                'post_id' => '1',
                'category_id' => '2',
            ],
            [
                'post_id' => '2',
                'category_id' => '2',
            ],
            [
                'post_id' => '2',
                'category_id' => '4',
            ],
            [
                'post_id' => '3',
                'category_id' => '2',
            ],
            [
                'post_id' => '4',
                'category_id' => '2',
            ],

        ];
        foreach ($categoryPost as $value) {
            DB::table('category_posts')->insert($value);
        }



    }
}
