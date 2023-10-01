<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users') ->insert(
        [
            'name' => 'admin',
            'email' => 'admin@shop.ru',
            'password' => 'QWEasd123',
            'admin' => true
        ]);
        DB::table('users') ->insert(
        [
            'name' => 'user',
            'email' => 'user@shop.ru',
            'password' => 'password',
        ]);
        DB::table('products') ->insert(
        [
            'name' => 'tovar',
            'description' => 'opisanie tovara',
            'cost' => '120',
        ]);
        DB::table('products') ->insert(
        [
                'name' => 'tovar2',
                'description' => 'opisanie tovara2',
                'cost' => '150',
        ]);
    }
}
