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
        $data=[
        	[
                'name' => 'admin',
        		'email'=>'admin1@gmail.com',
        		'password'=>bcrypt('12345')
        	],
        	[
                'name'=>'admin2',
        		'email'=>'admin2@gmail.com',
        		'password'=>bcrypt('12345')
            ],
        ];
        DB::table('users')->insert($data);
    }
}
