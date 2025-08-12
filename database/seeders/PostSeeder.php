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
                'title' => 'Studio by Preline',
                'content' => 'Produce professional, reliable streams easily leveraging Prelines innovative broadcast studio',
                'author' => 'a',
                'author_info' => 'b',
                'image' => 'https://images.unsplash.com/photo-1540575861501-7cf05a4b125a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80',
                'category' => 'c',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Studio by Preline2',
                'content' => 'Produce professional, reliable streams easily leveraging Prelines innovative broadcast studio',
                'author' => 'a2',
                'author_info' => 'b2',
                'image' => 'https://images.unsplash.com/photo-1540575861501-7cf05a4b125a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80',
                'category' => 'c2',
                'created_at' => now(),
                'updated_at' => now(),

            ],

        ]);
    }
}
