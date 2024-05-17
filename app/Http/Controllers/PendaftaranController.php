<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftaran = Pendaftaran::all();
        return view('pendaftaran.index', compact('pendaftaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('pendaftaran.create', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jurusan = Jurusan::where('nama_jurusan', $request->jurusan)->first();
        $kapasitasJurusan = $jurusan->kapasitas_jurusan;
        $jumlahPendaftar = Pendaftaran::where('jurusan', $request->jurusan)->count();

        if($kapasitasJurusan <= $jumlahPendaftar) {
            return redirect()->route('pendaftaran.index');
        } else  {
            $pendaftaran = new Pendaftaran();
            $pendaftaran->nama_lengkap = $request->nama_lengkap;
            $pendaftaran->sekolah_asal = $request->sekolah_asal;
            $pendaftaran->alamat = $request->alamat;
            $pendaftaran->jurusan = $request->jurusan;
            $pendaftaran->save();
            return redirect()->route('pendaftaran.index');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();
        session()->put('success', 'Data Berhasil dihapus');
        return redirect()->route('pendaftaran.index');
    }
}
