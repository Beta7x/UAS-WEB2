<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items') -> insert([
            'brand' => 'Lenovo',
            'seri' => 'Ideapad S145',
            'tahun_produksi' => '2021',
            'created_at' => '2022-05-20 23:57:27',
        ]);
    }
}
