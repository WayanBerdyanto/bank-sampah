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
                "nama_lengkap" => "TPA Bausasran",
                "no_telpon" => "123123123",
                "latitude" => "-7.797068",
                "longitude"=> "110.370529",
                "kapasitas"=> 50
            ],
            [
                "username" => "banksampah2",
                "email" => "banksampah2@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "banksampah",
                "nama_lengkap" => "TPA Gondokusuman",
                "no_telpon" => "123123123",
                "latitude" => "-7.788068",
                "longitude"=> "110.390529",
                "kapasitas"=> 50
            ],
            [
                "username" => "banksampah3",
                "email" => "banksampah3@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "banksampah",
                "nama_lengkap" => "TPA Banguntapan",
                "no_telpon" => "123123123",
                "latitude" => "-7.698168",
                "longitude"=> "110.290529",
                "kapasitas"=> 50
            ],
            [
                "username" => "banksampah4",
                "email" => "banksampah4@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "banksampah",
                "nama_lengkap" => "TPA Godean",
                "no_telpon" => "123123123",
                "latitude" => "-7.691068",
                "longitude"=> "110.240529",
                "kapasitas"=> 50
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
            [
                "username" => "pengambil2",
                "email" => "pengambil2@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "pengambil",
                "nama_lengkap" => "pengambil sampah 2",
                "no_telpon" => "123123123",
                "latitude" => "",
                "longitude"=> ""
            ],
            [
                "username" => "pengambil3",
                "email" => "pengambil3@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "pengambil",
                "nama_lengkap" => "pengambil sampah 3",
                "no_telpon" => "123123123",
                "latitude" => "",
                "longitude"=> ""
            ],
            [
                "username" => "banksampah5",
                "email" => "banksampah5@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "banksampah",
                "nama_lengkap" => "TPA Klitren",
                "no_telpon" => "123123123",
                "latitude" => "-7.697068",
                "longitude"=> "110.370529",
                "kapasitas"=> 50
            ],
            [
                "username" => "banksampah6",
                "email" => "banksampah6@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "banksampah",
                "nama_lengkap" => "TPA Gejayan",
                "no_telpon" => "123123123",
                "latitude" => "-7.697168",
                "longitude"=> "110.370529",
                "kapasitas"=> 50
            ],
            [
                "username" => "banksampah7",
                "email" => "banksampah7@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "banksampah",
                "nama_lengkap" => "TPA Tugu",
                "no_telpon" => "123123123",
                "latitude" => "-7.697158",
                "longitude"=> "110.370529",
                "kapasitas"=> 50
            ],
            [
                "username" => "banksampah8",
                "email" => "banksampah8@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "banksampah",
                "nama_lengkap" => "TPA Timoho",
                "no_telpon" => "123123123",
                "latitude" => "-7.697167",
                "longitude"=> "110.370529",
                "kapasitas"=> 50
            ],
            [
                "username" => "banksampah9",
                "email" => "banksampah9@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "banksampah",
                "nama_lengkap" => "TPA Tamsis",
                "no_telpon" => "123123123",
                "latitude" => "-7.682168",
                "longitude"=> "110.370529",
                "kapasitas"=> 50
            ],
            [
                "username" => "banksampah10",
                "email" => "banksampah10@gmail.com",
                "password" => bcrypt("12345678"),
                "role" => "banksampah",
                "nama_lengkap" => "TPA Kalasan",
                "no_telpon" => "123123123",
                "latitude" => "-7.678168",
                "longitude"=> "110.370529",
                "kapasitas"=> 50
            ],
        ]);

        DB::table("langganan")->insert([
            [
                'kode_langganan'=>'kode1',
                'nama_langganan'=>'Paket Mingguan',
                'layanan'=>'Berat Sampah max 7 Kg, Sistem Jemput, Praktis, Masa Langganan 7 Hari',
                'lama_langganan'=> 7,
                'desc'=>'lorem ipsum',
                'harga'=>35000,
            ],
            [
                'kode_langganan'=>'kode2',
                'nama_langganan'=>'Paket Bulanan',
                'layanan'=>'Berat Sampah Max 7 Kg , Sistem Jemput, Praktis, dan Masa Langganan 30 Hari',
                'lama_langganan'=> 30,
                'desc'=>'lorem ipsum',
                'harga'=>140000,
            ],
            [
                'kode_langganan'=>'kode3',
                'nama_langganan'=>'Paket 6 Bulanan',
                'layanan'=>'Berat Sampah Max 7 Kg , Sistem Jemput, Praktis, dan Masa Langganan 180 Hari',
                'lama_langganan'=> 180,
                'desc'=>'lorem ipsum',
                'harga'=>500000,
            ],
            [
                'kode_langganan'=>'kode4',
                'nama_langganan'=>'Paket Tahunan',
                'layanan'=>'Berat Sampah Max 7 Kg , Sistem Jemput, Praktis, dan Masa Langganan 365 Hari',
                'lama_langganan'=> 365,
                'desc'=>'lorem ipsum',
                'harga'=>800000,
            ],

        ]);
    }
}