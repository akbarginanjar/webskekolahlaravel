@extends('layouts.app')

@section('title')
    Tambah Pendaftar
@endsection

@section('content')
    <div class="container mx-auto mt-10">
        <div class="grid grid-cols-2 mb-3">
            <h1 style="font-size: 30px; font-weight: bold;">Tambah Data Pendaftaran</h1>
        </div>
        <div class="max-w-xl rounded overflow-hidden shadow-lg bg-white mt-2">
            <div class="px-5 mt-5">
                <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Nama Lengkap
                        </label>
                        <input
                            class="@error('nama_lengkap') border-red-500 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('nama_lengkap') }}" name="nama_lengkap" type="text" placeholder="Nama Lengkap">
                        @error('nama_lengkap')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Sekolah Asal
                        </label>
                        <input
                            class="@error('sekolah_asal') border-red-500 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('sekolah_asal') }}" name="sekolah_asal" type="text" placeholder="Sekolah Asal">
                        @error('sekolah_asal')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Alamat
                        </label>
                        <textarea rows="3"
                            class="@error('alamat') border-red-500 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="alamat" placeholder="Alamat Lengkap"></textarea>
                        @error('alamat')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Jurusan
                        </label>
                        <select
                            class="@error('jurusan') border-red-500 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="jurusan">
                            @foreach ($jurusan as $item)
                                <option value="{{ $item->nama_jurusan }}">{{ $item->nama_jurusan }}</option>
                            @endforeach
                        </select>
                        {{-- <input
                            class="@error('jurusan') border-red-500 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('jurusan') }}" name="jurusan" type="text" placeholder="Kapasitas Jurusan"> --}}
                        @error('jurusan')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-5 rounded float-right">
                            Simpan </button>
                    </div>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
@endsection
