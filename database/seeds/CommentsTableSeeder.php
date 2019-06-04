<?php
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('comments')->truncate();
        DB::table('comments')->insert([
            [
                'user_id'     => 1,
                'question_id' => 1,
                'comment'     => 'コメント',
                'created_at'  => Carbon::create('2016','3','20'),
            ],
            [
                'user_id'     => 1,
                'question_id' => 1,
                'comment'     => 'コメント',
                'created_at'  => Carbon::create('2016','3','21'),
            ]
        ]);
    }
}