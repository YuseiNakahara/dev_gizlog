<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DailyReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daily_reports')->insert([
            [
                'id'         => '1',
                'user_id'    => '1',
                'title'      => 'テスト',
                'contents'   => 'テストテスト',
                'reporting_time' => Carbon::create(2018, 1, 1),
            ],
            [
                'id'         => '2',
                'user_id'    => '1',
                'title'      => ' 長文テスト',
                'contents'   => 'テストテスト',
                'reporting_time' => Carbon::create(2018, 1, 1),
            ],
            [
                'id'         => '3',
                'user_id'    => '1',
                'title'      => 'Carbonのテスト',
                'contents'   => 'テストテスト',
                'reporting_time' => Carbon::create(2018, 1, 1),
            ],
            [
                'id'         => '4',
                'user_id'    => '1',
                'title'      => '日報のテスト',
                'contents'   => 'テストテスト',
                'reporting_time' => Carbon::create(2018, 1, 1),
            ],
        ]);
    }
}
