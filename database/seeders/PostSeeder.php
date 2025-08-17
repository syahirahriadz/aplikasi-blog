<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'slug' => 'asas-laravel-untuk-pemula',
                'title' => 'Asas Laravel untuk Pemula',
                'content' => 'Laravel ialah framework berasaskan PHP yang sangat sesuai untuk pemula kerana mempunyai dokumentasi lengkap, struktur kemas, dan komuniti yang besar. Dalam post ini kita akan belajar asas seperti routing, controller, dan Blade template. Dengan memahami asas ini, anda boleh mula membina aplikasi web anda sendiri.',
                'author' => 'Aida Syahirah',
                'author_info' => 'Pengajar Pengaturcaraan',
                'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                'category' => 'Pembangunan Web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'membangun-aplikasi-web-dengan-laravel',
                'title' => 'Membangun Aplikasi Web dengan Laravel',
                'content' => 'Membangun aplikasi web dengan Laravel memberikan banyak kelebihan dari segi masa pembangunan, kemudahan pengurusan kod, dan ciri keselamatan. Untuk pemula, Laravel adalah pilihan terbaik kerana ia mesra pengguna dan mempunyai komuniti yang besar untuk sokongan.',
                'created_at' => '2024-12-05',
                'author' => 'Mohamad Faiz',
                'author_info' => 'Pembangunan Backend',
                'image' => 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                'category' => 'Pembangunan Web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'pengaturcaraan-berorientasikan-objek-dengan-php',
                'title' => 'Pengaturcaraan Berorientasikan Objek dengan PHP',
                'content' => 'Pengaturcaraan Berorientasikan Objek dalam PHP adalah asas penting untuk menjadi seorang pembangun web profesional. Dengan memahami OOP, anda dapat membina aplikasi yang lebih mantap, tersusun, dan senang dikembangkan.',
                'created_at' => '2024-12-10',
                'author' => 'Muhammad Norsyahrin Seth',
                'author_info' => 'Pengajar Laravel',
                'image' => 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                'category' => 'Pengaturcaraan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'pengaturcaraan-berorientasikan-objek-dengan-php',
                'title' => 'Pengaturcaraan Berorientasikan Objek dengan PHP',
                'content' => 'Pengaturcaraan berorientasikan objek (OOP) adalah paradigma pengaturcaraan yang penting.',
                'created_at' => '2024-12-10',
                'author' => 'Aminah Siti',
                'author_info' => 'Pengajar Pengaturcaraan',
                'image' => 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                'category' => 'Pengaturcaraan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
