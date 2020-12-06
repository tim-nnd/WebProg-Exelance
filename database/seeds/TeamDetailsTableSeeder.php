<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teamdetails')->insert(array(
            array(
                'team_id' => 1,
                'user_id' => 2,
                'role_id' => 1,
            )
        ));
    }
}
