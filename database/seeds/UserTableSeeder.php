<?php
use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();

        User::create([
            'email' => 'user@gmail.com' ,
            'password' => bcrypt( '123123' ) ,
            'name' => 'user' ,
            ]);
    }
}
