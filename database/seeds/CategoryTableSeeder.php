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
        \App\Category::insert([
            [
                'name' => 'Laravel',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'name' => 'React Native',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'name' => 'Java Kotlin',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'name' => 'Android',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'name' => 'Other',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
