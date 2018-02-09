<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Bryan S.',
            'username' => 'Sandman',
            'email'    => 'bmsandoval@gmail.com',
            'password' => Hash::make('jAk9UFn4ZKg34RR'),
        ));
    }

}