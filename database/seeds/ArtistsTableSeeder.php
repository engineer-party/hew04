<?php

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artists')->insert([
            [
                'name'        => 'あいみょん',
                'description' => 'あいみょんの説明です',
                'img_url' => 'artist_1',
                'created_at'  => new DateTime(),
                'updated_at'  => new DateTime(),
            ],
            [
                'name'        => 'BTS',
                'description' => 'BTSの説明です',
                'img_url' => 'artist_2',
                'created_at'  => new DateTime(),
                'updated_at'  => new DateTime(),
            ],
        ]);
    }
}
