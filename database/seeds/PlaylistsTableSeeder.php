<?php

use Illuminate\Database\Seeder;

class PlaylistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('playlists')->insert([
            [
                'user_id'    => '1',
                'name'       => 'お気に入りプレイリスト',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id'    => '2',
                'name'       => 'プレイリストA',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
