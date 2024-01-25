@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data Siswa</h2>

        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/siswa/store" method="post">
            @csrf
            <label for="nis">NIS</label>
            <input type="text" name="nis" id="nis">

            <label for="nama_siswa">Nama siswa</label>
            <input type="text" name="nama_siswa" id="nama_siswa">

            <label>Jenis kelamin</label>
            <input type="radio" name="jk" value="L"> Laki-laki
            <input type="radio" name="jk" value="P"> Perempuan

            <label for="alamat">Alamat</label>
            <textarea name="alamat" rows="5" id="alamat"></textarea>

            <label for="kelas-id">Kelas</label>
            <select name="kelas_id" id="kelas_id">
                <option></option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }}</option>
                @endforeach
            </select>

            <label for="password">Password</label>
            <input type="password" name="password" id="password">


            <button type="submit" class="button-submit" name="button">Simpan</button>
        </form>
    </div>
@endsection
