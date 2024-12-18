<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name_category' => 'Refilling APAR CO2'],
            ['name_category' => 'Refilling APAR Serbuk Kering'],
            ['name_category' => 'Refilling APAR Foam'],
            ['name_category' => 'Refilling APAR Air'],
            ['name_category' => 'Refilling APAR Gas Clean Agent'],
        ]);
    }
}
