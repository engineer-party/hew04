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
                'genre_id'    => '1',
                'name'        => 'あいみょん',
                'description' => 'あいみょんの説明です',
                'created_at'  => new DateTime(),
                'updated_at'  => new DateTime(),
            ],
            [
                'genre_id'    => '2',
                'name'        => 'BTS',
                'description' => 'BTSの説明です',
                'created_at'  => new DateTime(),
                'updated_at'  => new DateTime(),
            ],
        ]);
    }
}
