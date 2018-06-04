<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserRole;
use App\Role;
use App\UserTask;
use App\Task;
class UserTableSeeder extends Seeder
{

    public function run()
    {
        if (empty(User::where('email', 'bmsandoval@gmail.com')->first())) {
            $user = User::firstOrNew([
                'name' => 'Bryan S.',
                'username' => 'Sandman',
                'email' => 'bmsandoval@gmail.com',
                'password' => Hash::make('B1fVqpnh9nyb'),
            ]);
        }

        UserRole::firstOrCreate([
            'user_id'=>'1', // me
            'role_id'=>Role::$admin, // admin
        ]);
    }
}