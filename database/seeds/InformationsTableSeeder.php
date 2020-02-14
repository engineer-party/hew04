<?php

use Illuminate\Database\Seeder;

class InformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('informations')->insert([
            [
                'title'      => 'サービス正式開始のお知らせ',
                'content'    => 'いつもHuncをご利用いただきありがとうございます。\r\nサービスが本格的に始まりました。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title'      => '音楽購入のお知らせ',
                'content'    => '購入ありがとうございます。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
