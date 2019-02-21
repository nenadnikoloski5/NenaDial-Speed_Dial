<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);



        DB::table('users')->insert([
            'username' => 'nenadn',
            
            'email' => 'nenad@gmail.com',
            'password' => bcrypt('1234qwer'),
            'created_at' => '2019-02-20 11:41:46',
            'updated_at' => '2019-02-20 11:41:46'
        ]);


        DB::table('items')->insert([
            'itemToUserID' => 1,
            'url' => "http://www.google.com",
            'justName' => 'google',
            'created_at' => '2019-02-20 13:41:46',
            'updated_at' => '2019-02-20 13:41:46'
        ]);

        DB::table('items')->insert([
            'itemToUserID' => 1,
            'url' => "http://www.youtube.com",
            'justName' => 'youtube',
            'created_at' => '2019-02-20 13:41:46',
            'updated_at' => '2019-02-20 13:41:46'
        ]);

        DB::table('items')->insert([
            'itemToUserID' => 1,
            'url' => "http://www.github.com/nenadnikoloski5",
            'justName' => 'github',
            'created_at' => '2019-02-20 13:41:46',
            'updated_at' => '2019-02-20 13:41:46'
        ]);



    }
}