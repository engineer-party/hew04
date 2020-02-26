<?php

use Illuminate\Database\Seeder;

class BuyPointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buy_points')->insert([
            [
                'user_id'    => '1',
                'price'      => 200,
                'point'      => 220,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id'    => '2',
                'price'      => 1000,
                'point'      => 1200,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
