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
        DB::table('users')->insert([
            [
                'name' => 'Adinistrator',
                'email' => 'admin@admin.com',
                'password' => bcrypt('secret'),
                'is_admin' => 1
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => bcrypt('secret'),
                'is_admin' => 0
            ]
        ]);
    }
}
