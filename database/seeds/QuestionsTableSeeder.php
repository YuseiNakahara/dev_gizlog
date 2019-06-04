<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->truncate();
        DB::table('questions')->insert([
            [
                'id'              => 1,
                'user_id'         => 1,
                'tag_category_id' => 1,
                'title'           => '初日',
                'content'        => 'コメント',
            ],
            [
                'id'              => 2,
                'user_id'         => 2,
                'tag_category_id' => 2,
                'title'           => '初日',
                'content'        => 'コメント',
            ],
            [
                'id'              => 3,
                'user_id'         => 3,
                'tag_category_id' => 3,
                'title'           => '初日',
                'content'        => 'コメント',
            ],
            [
                'id'              => 4,
                'user_id'         => 4,
                'tag_category_id' => 4,
                'title'           => '初日',
                'content'        => 'コメント',
            ]
        ]);
    }
}
