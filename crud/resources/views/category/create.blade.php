@extends('layouts.app')

@section('content')
    <h1>Tambah Kategori</h1>

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
    <!-- Form tambah kategori -->
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama kategori..." value="{{ old('nama') }}">
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
