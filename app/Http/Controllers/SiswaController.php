<?php

namespace App\Http\Controllers;

use App\Models\HasilSeleksi;
use App\Models\Jurusan;
use App\Models\Kriteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $siswa = User::where('role', 'siswa')->paginate(10);
        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(auth()->user()->role != 'admin', 403);

        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:64'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'confirmed', Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised(),
            ],
            'phone_number' => ['required', 'string', 'max:15'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'role' => 'siswa'
        ]);

        return redirect(route('siswa.nilai', $user->id))->with('message', 'Siswa berhasil ditambah!!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $data = User::where([
            ['id', $id],
            ['role', 'siswa']
        ])->firstOrFail();

        return view('siswa.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:64'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone_number' => ['required', 'string', 'max:15'],
        ]);


        $data = User::where([
            ['id', $id],
            ['role', 'siswa']
        ])->firstOrFail();

        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return redirect(route('siswa.edit', $id))->with('message', 'Siswa berhasil diupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $data = User::where([
            ['id', $id],
            ['role', 'siswa']
        ])->firstOrFail();

        $data->delete();

        return redirect()->back()->with('message', 'Siswa berhasil dihapus!!');
    }

    public function updatePassword(Request $request, $id)
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $validated = $request->validate([
            'password' => ['required', 'string', 'confirmed', Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised(),
            ],
        ]);

        $data = User::where([
            ['id', $id],
            ['role', 'siswa']
        ])->firstOrFail();

        $data->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('siswa.edit', $id))->with('message', 'Password siswa berhasil diupdate!!');
    }

    public function nilai($id)
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $data = User::where([
            ['id', $id],
            ['role', 'siswa']
        ])->firstOrFail();
        
        $hasil = HasilSeleksi::where('user_id', $id)->first();

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

        return view('siswa.nilai', compact('data', 'hasil', 'jurusan', 'nilai_akhir'));
    }

    public function updateNilai(Request $request, $id)
    {        
        abort_if(auth()->user()->role != 'admin', 403);

        $validated = $request->validate([
            'nilai_ijazah' => ['required', 'numeric', 'max:100'],
            'nilai_skhun' => ['required', 'numeric', 'max:100'],
            'nilai_tulis' => ['required', 'numeric', 'max:100'],
            'nilai_wawancara' => ['required', 'numeric', 'max:100'],
        ]);

        //smart 

        $kriteria_ijazah = Kriteria::where('id_kriteria', 1)->value('nilai_bobot');
        $kriteria_skhun = Kriteria::where('id_kriteria', 2)->value('nilai_bobot');
        $kriteria_tertulis = Kriteria::where('id_kriteria', 3)->value('nilai_bobot');
        $kriteria_wawancara = Kriteria::where('id_kriteria', 4)->value('nilai_bobot');

        $nilai_ijazah = 100 * ((100 - $request->nilai_ijazah) / (100 - 0));
        $nilai_akhir_ijazah = $nilai_ijazah * $kriteria_ijazah;

        $nilai_skhun = 100 * ((100 - $request->nilai_skhun) / (100 - 0));
        $nilai_akhir_skhun = $nilai_skhun * $kriteria_skhun;

        $nilai_tertulis = 100 * ((100 - $request->nilai_tulis) / (100 - 0));
        $nilai_akhir_tertulis = $nilai_tertulis * $kriteria_tertulis;

        $nilai_wawancara = 100 * ((100 - $request->nilai_wawancara) / (100 - 0));
        $nilai_akhir_wawancara = $nilai_wawancara * $kriteria_wawancara;
        
        $nilai_akhir = $nilai_akhir_ijazah +  $nilai_akhir_skhun +  $nilai_akhir_tertulis + $nilai_akhir_wawancara;

        HasilSeleksi::updateOrCreate(
            [
                'user_id' => $id
            ],
            [
                'nilai_ijazah' => $request->nilai_ijazah,
                'nilai_skhun' => $request->nilai_skhun,
                'nilai_tulis' => $request->nilai_tulis,
                'nilai_wawancara' => $request->nilai_wawancara,
                'nilai_akhir' =>  $nilai_akhir
            ]);

        return redirect()->route('siswa.nilai', $id);
    }
}
