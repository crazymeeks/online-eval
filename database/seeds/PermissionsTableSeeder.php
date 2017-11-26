<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'faculty-coordinator',
            'display_name' => 'Faculty Coordinator',
            'description' => 'The faculty coordinator of the site',
        ]);
    }
}
