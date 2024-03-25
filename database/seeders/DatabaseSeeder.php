<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('satellites')->insert([

            'title' => 'express80',

        ]);

        DB::table('roles')->insert([
            [
                'title' => 'administrator',
            ],
            [
                'title' => 'user',
            ],

        ]);

        DB::table('priorities')->insert([
            [
                'title' => 'Highest',
            ],
            [
                'title' => 'High',
            ],
            [
                'title' => 'Medium',
            ],
            [
                'title' => 'Low',
            ],
            [
                'title' => 'Lowest',
            ],
        ]);

        DB::table('statuses')->insert([
            [
                'title' => 'Новая',
            ],
            [
                'title' => 'В работе',
            ],
            [
                'title' => 'Решено',
            ],
            [
                'title' => 'Отменено',
            ],
        ]);

        DB::table('types')->insert([
            [
                'title' => 'Techical support'
            ],
            [
                'title' => 'Other'
            ],
        ]);

        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@mail.ru',
                'password' => Hash::make(123456),
                'email_verified_at' => now(),
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'alex',
                'email' => 'mirox1999@mail.ru',
                'password' => Hash::make(123456),
                'email_verified_at' => now(),
                'role_id'=> 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('profiles')->insert([
            [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1,
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 2,
            ],
        ]);
    }
}
