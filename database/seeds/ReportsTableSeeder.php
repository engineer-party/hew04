<?php

use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->insert([
            [
                'target_id'   => '2',
                'sender_id'   => '1',
                'category_id' => '1',
                'detail'      => '画像が気持ち悪い',
                'created_at'  => new DateTime(),
                'updated_at'  => new DateTime(),
            ],
            [
                'target_id'   => '1',
                'sender_id'   => '2',
                'category_id' => '2',
                'detail'      => '名前が差別的な要素を含んでいる',
                'created_at'  => new DateTime(),
                'updated_at'  => new DateTime(),
            ],
        ]);
    }
}
