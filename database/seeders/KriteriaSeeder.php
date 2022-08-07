<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_kriteria'=>'Ijazah', 'nilai_bobot' => 0.5, 'created_at' => now() , 'updated_at' => now()],
            ['nama_kriteria'=>'Skhun', 'nilai_bobot' => 0.3, 'created_at' => now() , 'updated_at' => now()],
            ['nama_kriteria'=>'Tes Tertulis', 'nilai_bobot' => 0.1, 'created_at' => now() , 'updated_at' => now()],
            ['nama_kriteria'=>'Tes Wawancara', 'nilai_bobot' => 0.1, 'created_at' => now() , 'updated_at' => now()],
        ];

        Kriteria::insert($data); // Eloquent approach
    }
}
