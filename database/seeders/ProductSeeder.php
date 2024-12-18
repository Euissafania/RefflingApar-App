<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product')->insert([
            [
                'id_category' => 1,
                'createSN' => 101,
                'name' => 'APAR CO2 2kg',
                'PNO' => 'PN12345',
                'price_lama' => 500000,
                'price' => 450000,
                'stock' => 100,
                'description' => 'APAR CO2 dengan kapasitas 2kg',
                'minQty' => 5,
                'weight' => 2.5,
                'expired' => 5, 
                'warranty' => 3, 
                'expiredSNI' => 10, 
                'warrantySNI' => 5, 
                'created_by' => 3,
                'Status' => 1,
                'panjang' => 45.5,
                'lebar' => 15.0,
                'tinggi' => 50.0,
                'fire_rating' => 'B:34 C',
                'media' => 'CO2',
                'type' => 'Portable',
                'kapasitas' => '2kg',
                'kelas_kebakaran' => 'B, C',
                'tabung_silinder' => 'Baja'
            ],
            [
                'id_category' => 2,
                'createSN' => 102,
                'name' => 'APAR Serbuk Kering 6kg',
                'PNO' => 'PN67890',
                'price_lama' => 600000,
                'price' => 550000.00,
                'stock' => 50,
                'description' => 'APAR serbuk kering 6kg',
                'minQty' => 3,
                'weight' => 6.5,
                'expired' => 5,
                'warranty' => 2,
                'expiredSNI' => 8,
                'warrantySNI' => 4,
                'created_by' => 3,
                'Status' => 1,
                'panjang' => 60.0,
                'lebar' => 20.0,
                'tinggi' => 55.0,
                'fire_rating' => 'A:55 B:34 C',
                'media' => 'Serbuk Kering',
                'type' => 'Portable',
                'kapasitas' => '6kg',
                'kelas_kebakaran' => 'A, B, C',
                'tabung_silinder' => 'Baja'
            ],
            [
                'id_category' => 3,
                'createSN' => 103,
                'name' => 'APAR Foam 9L',
                'PNO' => 'PN23456',
                'price_lama' => 700000,
                'price' => 650000.00,
                'stock' => 75,
                'description' => 'APAR busa (foam) 9 liter',
                'minQty' => 2,
                'weight' => 9.8,
                'expired' => 6,
                'warranty' => 3,
                'expiredSNI' => 12,
                'warrantySNI' => 6,
                'created_by' => 3,
                'Status' => 1,
                'panjang' => 70.0,
                'lebar' => 25.0,
                'tinggi' => 60.0,
                'fire_rating' => 'A:65 B:40',
                'media' => 'Foam',
                'type' => 'Portable',
                'kapasitas' => '9L',
                'kelas_kebakaran' => 'A, B',
                'tabung_silinder' => 'Aluminium'
            ],
            [
                'id_category' => 4,
                'createSN' => 104,
                'name' => 'APAR Air 10L',
                'PNO' => 'PN78901',
                'price_lama' => 800000,
                'price' => 750000.00,
                'stock' => 30,
                'description' => 'APAR air 10 liter',
                'minQty' => 4,
                'weight' => 10.5,
                'expired' => 7,
                'warranty' => 4,
                'expiredSNI' => 15,
                'warrantySNI' => 7,
                'created_by' => 3,
                'Status' => 1,
                'panjang' => 80.0,
                'lebar' => 30.0,
                'tinggi' => 70.0,
                'fire_rating' => 'A:70',
                'media' => 'Air',
                'type' => 'Portable',
                'kapasitas' => '10L',
                'kelas_kebakaran' => 'A',
                'tabung_silinder' => 'Stainless Steel'
            ],
        ]);
    }
}
