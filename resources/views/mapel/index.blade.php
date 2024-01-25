@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA MAPEL</h2>
            <a href="/mapel/create" class="button-primary">Tambah Data</a>
            <br>

            @if (session('success'))
                <div class="alert alert-success"><span class="closebtn" id="closeBtn">&times;</span>{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger"><span class="closebtn" id="closeBtn">&times;</span>{{ session('error') }}</div>
            @endif

            <table class="table-data">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Mapel</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mapel as $mpel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mpel->nama_mapel }}</td>
                            <td>
                                <a href="/mapel/edit/{{ $mpel->id }}" class="button-warning">EDIT</a>
                                <a href="/mapel/destroy/{{ $mpel->id }}" onclick="return confirm('Yakin hapus')" class="button-danger">HAPUS</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>

@endsection
