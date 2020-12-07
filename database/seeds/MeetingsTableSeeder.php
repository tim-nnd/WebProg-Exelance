<?php

use Illuminate\Database\Seeder;

class MeetingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meetings')->insert(array(
            array(
                'team_id' => 1,
                'user_id' => 2,
                'title' => 'Siapa yang kenal orang yang jago bikin html css?',
                'content' => 'Buat design UI/UX yang maksimal kita butuh orang yang udah jago html css nih, ada saran ga',
                'created_at' => '2020-12-05 17:04:02'
            ),
            array(
                'team_id' => 1,
                'user_id' => 2,
                'title' => 'ID Password buat ngambil resources di freepik premium',
                'content' => 'erik@gmail.com:erik',
                'created_at' => '2020-12-06 11:04:02'
            )
        ));
    }
}
