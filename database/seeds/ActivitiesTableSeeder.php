<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activities')->insert(array(
            array(
                'user_id' => '1',
                'name' => 'Breakfast',
                'description' => 'Makan Pagi biar Semangat',
                'photo' => 'breakfast.jpg',
                'time' => '08:30',
            ),
            array(
                'user_id' => '1',
                'name' => 'Jogging',
                'description' => 'Olahraga Pagi biar Sehat',
                'photo' => 'jogging.jpg',
                'time' => '06:30',
            ),
            array(
                'user_id' => '1',
                'name' => 'Sleep',
                'description' => 'Istirahat',
                'photo' => 'sleep.jpg',
                'time' => '22:30',
            ),
        ));
    }
}
