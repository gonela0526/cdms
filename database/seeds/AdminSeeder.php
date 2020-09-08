<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admins')->insert([
            [
              'name' => 'sumanth',
              'email' => 'sumanth@example.com',
              'password' => Hash::make('qwerty123'),
            ],
            [
                'name' => 'uday',
                'email' => 'uday@example.com',
                'password' => Hash::make('qwerty123'),
            ],
        ]);

        DB::table('users')->insert([
              'name' => 'user',
              'email' => 'user@example.com',
              'password' => Hash::make('qwerty123'),
        ]);
    }
}
