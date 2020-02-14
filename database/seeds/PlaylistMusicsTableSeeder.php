<?php

use Illuminate\Database\Seeder;

class PlaylistMusicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('playlist_musics')->insert([
            [
                'playlist_id' => '1',
                'music_id'       => '1',
                'order'       => 1,
                'created_at'  => new DateTime(),
                'updated_at'  => new DateTime(),
            ],
            [
                'playlist_id' => '1',
                'music_id'       => '2',
                'order'       => 2,
                'created_at'  => new DateTime(),
                'updated_at'  => new DateTime(),
            ],
            [
                'playlist_id' => '2',
                'music_id'       => '2',
                'order'       => 1,
                'created_at'  => new DateTime(),
                'updated_at'  => new DateTime(),
            ],
            [
                'playlist_id' => '2',
                'music_id'       => '1',
                'order'       => 2,
                'created_at'  => new DateTime(),
                'updated_at'  => new DateTime(),
            ],
        ]);
    }
}
