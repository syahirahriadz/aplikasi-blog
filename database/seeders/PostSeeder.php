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
                'title' => 'Asas Laravel untuk Pemula',
                'content' => 'Pengaturcaraan asas adalah langkah pertama dalam dunia teknologi. Dalam',
                'author' => 'Aida Syahirah',
                'author_info' => 'Pengajar Pengaturcaraan',
                'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                'category' => 'Pembangunan Web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Membangun Aplikasi Web dengan Laravel',
                'content' => 'Laravel adalah framework PHP yang popular untuk membangunkan aplikasi web.',
                'created_at' => '2024-12-05',
                'author' => 'Mohamad Faiz',
                'author_info' => 'Pembangunan Backend',
                'image' => 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                'category' => 'Pembangunan Web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pengaturcaraan Berorientasikan Objek dengan PHP',
                'content' => 'Pengaturcaraan berorientasikan objek (OOP) adalah paradigma pengaturcaraan yang penting.',
                'created_at' => '2024-12-10',
                'author' => 'Muhammad Norsyahrin Seth',
                'author_info' => 'Pengajar Laravel',
                'image' => 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                'category' => 'Pengaturcaraan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
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
