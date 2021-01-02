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
        $roles = [
            ['name'=>'Admin'],
            ['name'=>'Editor'],
            ['name'=>'Creator']
        ];

        foreach ($roles as $role){
            \App\Role::create($role);
        }
    }
}
