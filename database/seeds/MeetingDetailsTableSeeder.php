<?php

use Illuminate\Database\Seeder;

class MeetingDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meetingdetails')->insert(array(
            array(
                'meeting_id' => 1,
                'user_id' => 1,
                'content' => 'Keknya si Anto bisa deh dia dah biasa bikin gitu-gituan',
                'created_at' => '2020-12-05 17:50:25',
            ),
        ));
    }
}
