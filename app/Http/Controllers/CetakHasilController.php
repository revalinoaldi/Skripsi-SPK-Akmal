<?php

namespace App\Http\Controllers;

use App\Models\HasilSeleksi;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class CetakHasilController extends Controller
{
    public function index()
    {
        abort_if(auth()->user()->role != 'siswa', 403);

        $hasil = HasilSeleksi::where('user_id', auth()->user()->id)->first();

        if(empty($hasil->nilai_akhir))
        {
            $nilai_akhir = 0;
        }else{
            $nilai_akhir = $hasil->nilai_akhir;
        }

        $jurusan = Jurusan::where([
            ['range_1', '<=', $nilai_akhir],
            ['range_2', '>=', $nilai_akhir],
        ])->get();

        return view('cetak-hasil.index', compact('hasil', 'jurusan', 'nilai_akhir'));
    }
}
