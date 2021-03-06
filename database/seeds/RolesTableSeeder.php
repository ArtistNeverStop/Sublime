<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if  (!Role::count()) {
            $admin = Role::create([
            	'name' => 'admin'
            ]);
            $staff = Role::create([
            	'name' => 'staff'
            ]);
            $worker = Role::create([
            	'name' => 'worker'
            ]);
            User::all()->each(function ($user) {
            	$user->roles()->attach(Role::inRandomOrder()->first());
            });
        }
    }
}
