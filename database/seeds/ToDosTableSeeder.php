<?php

use Illuminate\Database\Seeder;

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
                'status' => true,
            ),
            array(
                'user_id' => '1',
                'name' => 'Assignment CT',
                'deadline' => '2020-12-04',
                'status' => false,
            ),
            array(
                'user_id' => '1',
                'name' => 'Assignment OOAD',
                'deadline' => '2020-12-12',
                'status' => false,
            ),
        ));
    }
}
