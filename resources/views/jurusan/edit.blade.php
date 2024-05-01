@extends('layouts.app')

@section('title')
    Edit Jurusan
@endsection

@section('content')
    <div class="container mx-auto mt-10">
        <div class="grid grid-cols-2 mb-3">
            <h1 style="font-size: 30px; font-weight: bold;">Edit Data Jurusan</h1>
        </div>
        <div class="max-w-xl rounded overflow-hidden shadow-lg bg-white mt-2">
            <div class="px-5 mt-5">
                <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Kode Jurusan
                        </label>
                        <input
                            class="@error('kode_jurusan') border-red-500 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ $jurusan->kode_jurusan }}" name="kode_jurusan" type="text"
                            placeholder="Kode Jurusan">
                        @error('kode_jurusan')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Nama Jurusan
                        </label>
                        <input
                            class="@error('nama_jurusan') border-red-500 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ $jurusan->nama_jurusan }}" name="nama_jurusan" type="text"
                            placeholder="Nama Jurusan">
                        @error('nama_jurusan')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Kapasitas Jurusan
                        </label>
                        <input
                            class="@error('kapasitas_jurusan') border-red-500 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ $jurusan->kapasitas_jurusan }}" name="kapasitas_jurusan" type="text"
                            placeholder="Kapasitas Jurusan">
                        @error('kapasitas_jurusan')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-5 rounded float-right">
                            Simpan Perubahan</button>
                    </div>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
@endsection
