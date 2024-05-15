@extends('layouts.app')

@section('title')
    Jurusan
@endsection



@section('content')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <div class="container mx-auto mt-10">
        <div class="grid grid-cols-2 mb-3">
            <h1 style="font-size: 30px; font-weight: bold;">Data Jurusan</h1>
            <div>
                <a href="{{ route('jurusan.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-5 rounded float-right">Tambah
                    Jurusan</a>
            </div>
        </div>
        <div class="max rounded overflow-hidden shadow-lg bg-white mt-2">
            <div class="px-5">
                <div class="relative">
                    <table class="w-full text-sm text-left rtl:text-right  mt-5 mb-5" style="border-radius: 3px;">
                        <thead class="text-xs uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Kode Jurusan</th>
                                <th scope="col" class="px-6 py-3">Nama Jurusan</th>
                                <th scope="col" class="px-6 py-3">Kapasitas Jurusan</th>
                                <th scope="col" class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($jurusan as $item)
                                <tr class="bg-white border-b ">
                                    <td class="px-6 py-4">{{ $no++ }}</td>
                                    <td class="px-6 py-4">{{ $item->kode_jurusan }}</td>
                                    <td class="px-6 py-4"> {{ $item->nama_jurusan }} </td>
                                    <td class="px-6 py-4"> {{ $item->kapasitas_jurusan }} Mahasiswa</td>
                                    <td class="">
                                        <form class="mt-3" action="{{ route('jurusan.destroy', $item->id) }}"
                                            method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{ route('jurusan.edit', $item->id) }}"
                                                class="bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-5 rounded">Edit</a>
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white py-2 px-5 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
