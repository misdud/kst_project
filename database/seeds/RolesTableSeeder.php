<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('roles_users')->insert([
           'role_id'=>'1',
           'user_id'=>'2',
       ]);
    }
}
