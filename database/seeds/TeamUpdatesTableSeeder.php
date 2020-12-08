<?php

use Illuminate\Database\Seeder;

class TeamUpdatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teamupdates')->insert(array(
            array(
                'team_id' => 1,
                'user_id' => 2,
                'message' => 'Finished Create Proposal Task',
                'created_at' => '2020-12-04 15:02:03',
            ),
            array(
                'team_id' => 1,
                'user_id' => 2,
                'message' => 'Post a new Question',
                'created_at' => '2020-12-05 17:04:02',
            ),
            array(
                'team_id' => 1,
                'user_id' => 2,
                'message' => 'Post a new Question',
                'created_at' => '2020-12-06 11:04:02',
            ),
            
        ));
    }
}
