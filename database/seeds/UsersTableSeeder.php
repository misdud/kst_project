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
        
          'name'=>'Дудко Михаил',
          'login'=>'378512',
          'activ'=>1,
          'password'=>12345,
           
        ]);
    }
}
