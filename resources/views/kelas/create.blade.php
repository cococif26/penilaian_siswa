@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data kelas</h2>

        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/kelas/store" method="post">
            @csrf
            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas">
                <option></option>
                @foreach ($tingkat_kelas as $kt)
                    <option value="{{ $kt }}">{{ $kt }}</option>
                @endforeach
            </select>

            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan">
                <option></option>
                @foreach ($jurusan as $j)
                    <option value="{{ $j }}">{{ $j }}</option>
                @endforeach
            </select>

            <label for="rombel">Rombel</label>
            <input type="number" name="rombel" id="rombel" max="4" min="1">

            <button type="submit" class="button-submit" name="button">Simpan</button>
        </form>
    </div>
@endsection
