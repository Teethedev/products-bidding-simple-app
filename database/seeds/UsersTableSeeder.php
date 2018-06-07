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
        /*DB::table('users')->insert([
            'name' => 'Thabo Madibane',
            'email' => 'madibane.tt@gmail.com',
            'password' => bcrypt('Kee@ps123'),
        ]);*/
        factory(App\User::class, 1)->create();
    }
}
