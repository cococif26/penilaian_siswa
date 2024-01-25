<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mengajar;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kelas.index', [
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = ['DKV', 'RPL', 'SIJA', 'TKJ', 'TOI', 'DPIB', 'TP', 'TFLM', 'TKR', 'BKP'];
        $tingkat_kelas = ['10', '11', '12', '13'];
        return view('kelas.create', [
            'tingkat_kelas' => $tingkat_kelas,
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data_kelas = $request->validate([
            'kelas' => ['required'],
            'jurusan' => ['required'],
            'rombel' => ['required']
        ]);

        $kelas = Kelas::firstOrNew($data_kelas);
        if($kelas->exists)
        {
            return back()->with('error', "Data kelas yang dimasukan sudah ada");
        } else {
            $kelas->save();
            return redirect('/kelas/index')->with('success', "Data berhasil ditambahkan");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        $jurusan = ['DKV', 'RPL', 'SIJA', 'TKJ', 'TOI', 'DPIB', 'TP', 'TFLM', 'TKR', 'BKP'];
        $tingkat_kelas = ['10', '11', '12', '13'];
        return view('kelas.edit', [
            'kelas' => $kelas,
            'tingkat_kelas' => $tingkat_kelas,
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $data_kelas = $request->validate([
            'kelas' => ['required'],
            'jurusan' => ['required'],
            'rombel' => ['required']
        ]);

        if($request->kelas !=$kelas->kelas || $request->jurusan !=$kelas->jurusan || $request->rombel !=$kelas->rombel)
        {
            $cek_kelas = Kelas::where('kelas', $request->kelas)->where('jurusan', $request->jurusan)->where('rombel', $request->mapel)->first();

            if($cek_kelas)
            {
                return back()->with('error', "Data kelas yang dimasukan sudah ada");
            }
        }
        $kelas->update($data_kelas);
        return redirect('/kelas/index')->with('success', "Data berhasil di ubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $siswa = Siswa::where('kelas_id', $kelas->id)->first();
        $mengajar = Mengajar::where('kelas_id', $kelas->id)->first();

        $kelas_dipakai = "$kelas->kelas $kelas->jurusan $kelas->rombel";

        if($siswa){
            return back()->with('error', "$kelas_dipakai masih digunakan di menu siswa");
        }
        if($mengajar) {
            return back()->with('error', "$kelas_dipakai di menu mengajar");
        }

        $kelas->delete();
        return back()->with('success', "Data berhasil di hapus");
    }
}
