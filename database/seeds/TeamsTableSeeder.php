<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert(array(
            array(
                'team_img' => 'pizza.png',
                'team_name' => 'Phizza Team',
            ),
        ));
    }
}
