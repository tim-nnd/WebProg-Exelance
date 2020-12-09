<?php

use Illuminate\Database\Seeder;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert(array(
            array(
                'team_id' => 1,
                'title' => 'Website buat ambil asset',
                'content' => 'freepik.com',
                'created_at' => '2020-12-05 11:04:02',
            ),
            array(
                'team_id' => 1,
                'title' => 'Website Bootstrap',
                'content' => 'getbootstrap.com',
                'created_at' => '2020-12-06 11:04:02',
            ),
        ));
    }
}
