<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            [
                'name' => 'Shinr Ryu Jhin',
                'NI' => '131020302030',
                'jenis_kelamin' => 'Laki-Laki',
                'phone' => '08998989898',
                'tanggal_lahir' => '19/02/1990',
                'alamat' => 'Jln. Abc Bandung',
                'email' => 'super@gmail.com',
                'password' => bcrypt('admin'),
                'role' => 'admin',
                'bio' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at
                the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.',
                'quotes' => 'Kalau Orang Lain Bisa kenapa Harus saya',
                'image' => '/upload/photouser/default.jpg',
                'is_active' => 1,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'name' => 'Thamales Rudi',
                'NI' => '131020302030',
                'phone' => '08998989898',
                'jenis_kelamin' => 'Laki-Laki',
                'tanggal_lahir' => '19/02/1990',
                'alamat' => 'Jln. Abc Bandung 2',
                'email' => 'dosen@gmail.com',
                'password' => bcrypt('dosen'),
                'image' => '/upload/photouser/default.jpg',
                'role' => 'dosen',
                'bio' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at
                the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.',
                'quotes' => 'Kalau Orang Lain Bisa kenapa Harus saya',
                'is_active' => 1,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'name' => 'Aminatiar Baskara',
                'NI' => '131020302030',
                'phone' => '08998989898',
                'jenis_kelamin' => 'Laki-Laki',
                'tanggal_lahir' => '19/02/1990',
                'alamat' => 'Jln. Abc Bandung 3',
                'email' => 'mahasiswa@gmail.com',
                'password' => bcrypt('mahasiswa'),
                'image' => '/upload/photouser/default.jpg',
                'role' => 'mahasiswa',
                'bio' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at
                the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.',
                'quotes' => 'Kalau Orang Lain Bisa kenapa Harus saya',
                'is_active' => 1,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
