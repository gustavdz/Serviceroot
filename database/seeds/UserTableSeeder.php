<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array([
            'name'=>'Gustavo Decker',
            'username'=>'gustavdz',
            'email'=> 'gustavdz@gmail.com',
            'password'=>Hash::make('Gustavo123'),
            'admin'=>true,
            'supplier'=>true,
            'email_verified_at'=>now(),
        ]);

        foreach($users as $user){
            User::create($user);
        }

    }
}
