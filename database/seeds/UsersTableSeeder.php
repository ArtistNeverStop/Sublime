<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if  (!User::count()) {
            factory(User::class, 10)->create();
            factory(User::class)->create([
                'email' => 'diego_giova@hotmail.com'
            ])->roles()->attach(1);
        }
    }
}
