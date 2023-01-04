@extends('layouts.app')

@section('content')
    <h1>Edit Kategori</h1>

    <!-- Menampilkan error validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form edit kategori -->
    <form action="{{ route('kategori.update', ['kategori' => $kategori->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama kategori..." value="{{ old('nama', $kategori->nama) }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
