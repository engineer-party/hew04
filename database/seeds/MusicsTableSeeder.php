<?php

use Illuminate\Database\Seeder;

class MusicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('musics')->insert([
            [
                'artist_id' => '1',
                'genre_id' => '1',
                'name' => 'マリーゴールド',
                'time' => '05:08',
                'price' => 300,
                'release_date' => '2018-08-08',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'artist_id' => '2',
                'genre_id' => '2',
                'name' => 'DNA',
                'time' => '04:15',
                'price' => 500,
                'release_date' => '2017-06-18',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
