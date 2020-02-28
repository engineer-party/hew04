<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            [
                'name'       => '明るい',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name'       => '楽しい',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name'       => '温かい',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name'       => '穏やか',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name'       => '優しい',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name'       => '爽やか',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name'       => 'お洒落',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name'       => '力強い',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name'       => '弱々しい',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name'       => '懐かしい',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name'       => '不思議',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name'       => '可愛い',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
