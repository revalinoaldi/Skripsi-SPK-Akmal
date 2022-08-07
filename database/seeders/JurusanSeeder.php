<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama_jurusan'=>'Akuntansi', 
                'range_1' => 20, 
                'range_2' => 21, 
                'created_at' => now() , 
                'updated_at' => now()
            ],
            [
                'nama_jurusan'=>'Perpajakan', 
                'range_1' => 18, 
                'range_2' => 19, 
                'created_at' => now() , 
                'updated_at' => now()
            ],
            [
                'nama_jurusan'=>'Perkantoran', 
                'range_1' => 16, 
                'range_2' => 17, 
                'created_at' => now() , 
                'updated_at' => now()
            ],
        
        ];

        Jurusan::insert($data); // Eloquent approach
    }
}
