<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'samsung',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 2,
                'name' => 'oppo',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 3,
                'name' => 'apple',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 4,
                'name' => 'nokia',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]
        ]);
    }
}
