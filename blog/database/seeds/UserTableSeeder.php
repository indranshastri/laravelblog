<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // rest the user table
        DB::statement("set FOREIGN_KEY_CHECKS = 0");
        DB::table('users')->truncate();
        $date = date("Y-m-d H:i:s",strtotime("2017-07-18 00:00:00 "));
        //generate 3 user authot
        DB::table('users')->insert([
          [
            "name"=>"Jhon doe",
            "email"=>"johndoe@test.com",
            "password"=>bcrypt("secret"),
            "created_at"=> $date,
            "updated_at"=> $date,
          ],[
            "name"=>"Jane doe",
            "email"=>"janedoe@test.com",
            "password"=>bcrypt("secret1"),
            "created_at"=> $date,
            "updated_at"=> $date,
          ],[
            "name"=>"Edd doe",
            "email"=>"eddoe@test.com",
            "password"=>bcrypt("secret2"),
            "created_at"=> $date,
            "updated_at"=> $date,
          ]
        ]);
    }
}
