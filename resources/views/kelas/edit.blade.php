@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data kelas</h2>

        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/kelas/update/{{ $kelas->id }}" method="post">
            @csrf
            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas">
                @foreach ($tingkat_kelas as $kt)
                    @if ($kelas->kelas == $kt)
                        <option value="{{ $kt }}" selected>{{ $kt }}</option>
                    @else
                        <option value="{{ $kt }}">{{ $kt }}</option>
                    @endif
                @endforeach
            </select>

            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan">
                @foreach ($jurusan as $j)
                    @if ($kelas->jurusan == $j)
                        <option value="{{ $j }}" selected>{{ $j }}</option>
                    @else
                        <option value="{{ $j }}">{{ $j }}</option>
                    @endif
                @endforeach
            </select>

            <label for="rombel">Rombel</label>
            <input type="number" name="rombel" id="rombel" max="4" min="1" value="{{ $kelas->rombel }}">

            <button type="submit" class="button-submit" name="button">Ubah</button>
        </form>
    </div>
@endsection
