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
        DB::table('users')->insert([
            'lastname' => 'Fadera',
            'firstname' => 'Irene',
            'email' => 'irene.fadera@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
