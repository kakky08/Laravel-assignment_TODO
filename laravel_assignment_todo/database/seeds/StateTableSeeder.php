<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'state' => '削除',
        ]);
        DB::table('states')->insert([
            'state' => 'すべて',
        ]);

        DB::table('states')->insert([
            'state' => '作業中',
        ]);
        DB::table('states')->insert([
            'state' => '完了',
        ]);
    }
}
