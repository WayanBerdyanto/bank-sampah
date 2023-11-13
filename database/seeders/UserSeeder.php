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
        DB::table("users")->insert([
            [
                "username" => "pengambil1",
                "email" => "pengambil@gmail.com",
                "password" => bcrypt("123"),
                "role" => "pengambil",
                "nama_lengkap" => "pengambil sampah",
                "no_telpon" => "123123123",
            ],
            [
                "username" => "banksampah1",
                "email" => "banksampah@gmail.com",
                "password" => bcrypt("123"),
                "role" => "banksampah",
                "nama_lengkap" => "bank sampah",
                "no_telpon" => "123123123",
            ],
        ]);
    }
}
