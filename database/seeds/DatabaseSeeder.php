<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(ToDosTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(TeamDetailsTableSeeder::class);
        $this->call(TeamToDosTableSeeder::class);
        $this->call(MeetingsTableSeeder::class);
        $this->call(MeetingDetailsTableSeeder::class);
        $this->call(ResourcesTableSeeder::class);
    }
}
