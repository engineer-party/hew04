<?php

use Illuminate\Database\Seeder;

class GenreMusicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genre_music')->insert([
            [
                'genre_id'    => '1',
                'music_id'   => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'genre_id'    => '2',
                'music_id'   => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'genre_id'    => '2',
                'music_id'   => '2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
