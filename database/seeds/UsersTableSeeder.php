<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array(
                'name' => 'hanson',
                'email' => 'hanson@gmail.com',
                'password' => Hash::make('hanson'),
            ),
            array(
                'name' => 'erik',
                'email' => 'erik@gmail.com',
                'password' => Hash::make('erik'),
            ),
        ));
    }
}
