<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            AdminsTableSeeder::class,
            GenresTableSeeder::class,
            ArtistsTableSeeder::class,
            MusicsTableSeeder::class,
            BuyMusicsTableSeeder::class,
            BuyPointsTableSeeder::class,
            InformationsTableSeeder::class,
            UserInformationsTableSeeder::class,
            PlaylistsTableSeeder::class,
            PlaylistMusicsTableSeeder::class,
            ReportCategoriesTableSeeder::class,
            ReportsTableSeeder::class,
            GenreMusicTableSeeder::class,
        ]);
    }
}
