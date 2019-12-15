<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    //for roles default
    public function run() {
        DB::table('roles')->insert([
                [
                'rolename' => 'admin',
                'inforole' => 'Main admin for full access',
            ],
                [
                'rolename' => 'moder_kanc',
                'inforole' => 'Validator oldres kancler',
            ],
                [
                'rolename' => 'mang_kanc',
                'inforole' => 'Open\clos zaiv +edit sp prod',
            ],
                [
                'rolename' => 'user_all',
                'inforole' => 'For access all service',
            ],
        ]);
    }

}
