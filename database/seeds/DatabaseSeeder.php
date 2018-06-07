<?php

use Illuminate\Database\Seeder;
//use App\Model;
use App\database\seeds\UserTableSeeder;
use App\database\seeds\IssueTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();
         $this->call(UsersTableSeeder::class);
         $this->call(ProductSeeder::class);
        //Model::reguard();
    }
}
