<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToDosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert(array(
            array(
                'user_id' => '1',
                'name' => 'Assignment FLA',
                'deadline' => '2020-12-01',
                'status' => false,
            ),
            array(
                'user_id' => '1',
                'name' => 'Assignment CT',
                'deadline' => '2020-12-15',
                'status' => false,
            ),
            array(
                'user_id' => '1',
                'name' => 'Assignment OOAD',
                'deadline' => '2020-12-21',
                'status' => false,
            ),
        ));
    }
}
