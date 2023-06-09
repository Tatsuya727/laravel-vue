<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("items")->insert([
            [
                "name" => "カット",
                "memo" => "カットのメモ",
                "price" => 6000,
            ],
            [
                "name" => "カラー",
                "memo" => "カラーのメモ",
                "price" => 8000,
            ],
            [
                "name" => "パーマ",
                "memo" => "パーマのメモ",
                "price" => 13000,
            ]
        ]);
    }
}
