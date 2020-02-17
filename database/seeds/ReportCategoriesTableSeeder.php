<?php

use Illuminate\Database\Seeder;

class ReportCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('report_categories')->insert([
            [
                'name'       => '不適切な画像',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name'       => '不適切な名前',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name'       => 'データ改ざん',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name'       => '位置情報改ざん',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name'       => 'その他',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
