<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Validator;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            // 'kode_jurusan' => 'required',
            'nama_jurusan' => 'required',
            'kapasitas_jurusan' => 'required',
        ];

        $message = [
            'required' => 'Data wajib diisi!',
            'unique' => 'Data sudah ada!',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            session()->put(
                'danger',
                'Data yang anda input tidak valid, silahkan di ulang'
            );
            return back()
                ->withErrors($validation)
                ->withInput();
        }
        $jurusan = new Jurusan();
        // $jurusan->kode_jurusan = $request->kode_jurusan;
        $jurusan->kode_jurusan = $this->generateUniqueCode();
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->kapasitas_jurusan = $request->kapasitas_jurusan;
        $jurusan->save();
        session()->put('success', 'Data Berhasil ditambahkan');
        return redirect()->route('jurusan.index');
    }
    private function generateUniqueCode()
    {
        $count = Jurusan::count() + 1;
        return str_pad($count, 3, '0', STR_PAD_LEFT);
    }
    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'kode_jurusan' => 'required',
            'nama_jurusan' => 'required',
            'kapasitas_jurusan' => 'required',
        ];

        $message = [
            'required' => 'Data wajib diisi!',
            'unique' => 'Data sudah ada!',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            session()->put(
                'danger',
                'Data yang anda input tidak valid, silahkan di ulang'
            );
            return back()
                ->withErrors($validation)
                ->withInput();
        }
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->kode_jurusan = $request->kode_jurusan;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->kapasitas_jurusan = $request->kapasitas_jurusan;
        $jurusan->save();
        session()->put('success', 'Data Berhasil diedit');
        return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();
        session()->put('success', 'Data Berhasil dihapus');
        return redirect()->route('jurusan.index');
    }
}