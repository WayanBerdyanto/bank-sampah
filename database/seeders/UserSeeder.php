<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->times(100)->create();
        DB::table("users")->insert([
            [
                "username" => "pengambil1",
                "email" => "pengambil@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "pengambil",
                "nama_lengkap" => "pengambil sampah",
                "no_telpon" => "123123123",
                "latitude" => "",
                "longitude"=> ""
            ],
            [
                "username" => "banksampah1",
                "email" => "banksampah@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "banksampah",
                "nama_lengkap" => "bank sampah 1",
                "no_telpon" => "123123123",
                "latitude" => "-7.797068",
                "longitude"=> "110.370529"
            ],
            [
                "username" => "banksampah2",
                "email" => "banksampah2@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "banksampah",
                "nama_lengkap" => "bank sampah 2",
                "no_telpon" => "123123123",
                "latitude" => "-7.798068",
                "longitude"=> "110.390529"
            ],
            [
                "username" => "banksampah3",
                "email" => "banksampah3@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "banksampah",
                "nama_lengkap" => "bank sampah 3",
                "no_telpon" => "123123123",
                "latitude" => "-7.698068",
                "longitude"=> "110.290529"
            ],
            [
                "username" => "banksampah4",
                "email" => "banksampah4@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "banksampah",
                "nama_lengkap" => "bank sampah 4",
                "no_telpon" => "123123123",
                "latitude" => "-7.693068",
                "longitude"=> "110.240529"
            ],
            [
                "username" => "pengguna1",
                "email" => "pengguna@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "pengguna",
                "nama_lengkap" => "Pengguna Wayan",
                "no_telpon" => "123123123",
                "latitude" => "",
                "longitude"=> ""
            ],
        ]);

        DB::table("langganan")->insert([
            [
                'kode_langganan'=>'GOLD1',
                'nama_langganan'=>'Paket Mingguan',
                'layanan'=>'keren, rapi, aman, dan tentram',
                'lama_langganan'=> 7,
                'desc'=>'lorem ipsum',
                'harga'=>35000,
            ],
            [
                'kode_langganan'=>'GOLD2',
                'nama_langganan'=>'Paket Bulanan',
                'layanan'=>'keren, rapi, aman, dan tentram',
                'lama_langganan'=> 30,
                'desc'=>'lorem ipsum',
                'harga'=>120000,
            ],
            [
                'kode_langganan'=>'GOLD3',
                'nama_langganan'=>'Paket 6 Bulanan',
                'layanan'=>'keren, rapi, aman, dan tentram',
                'lama_langganan'=> 180,
                'desc'=>'lorem ipsum',
                'harga'=>120000,
            ],
            [
                'kode_langganan'=>'GOLD4',
                'nama_langganan'=>'Paket Tahunan',
                'layanan'=>'keren, rapi, aman, dan tentram',
                'lama_langganan'=> 365,
                'desc'=>'lorem ipsum',
                'harga'=>120000,
            ],

        ]);
    }
}