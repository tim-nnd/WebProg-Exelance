<?php

use Illuminate\Database\Seeder;
use illuminate\Support\Facades\DB;

class TeamToDosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teamtodos')->insert(array(
            array(
                'team_id' => 1,
                'title' => 'Create Proposal',
                'content' => 'Bikin proposal mengenai aplikasi beserta fitur-fiturnya',
                'deadline' => '2020-12-02',
                'status' => 1,
            ),
            array(
                'team_id' => 1,
                'title' => 'Create UI Prototype',
                'content' => 'Bikin prototype UI agar ada gambaran mengenai aplikasi yang dirancang',
                'deadline' => '2020-12-21',
                'status' => 0,
            )
        ));
    }
}
