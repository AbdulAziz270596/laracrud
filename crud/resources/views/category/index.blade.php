@extends('layouts.app')

@section('content')
    <h1>Daftar Kategori</h1>

    <!-- Form pencarian -->
    <form action="{{ route('kategori.index') }}" method="GET">
        <div class="form-group">
            <input type="text" name="q" class="form-control" placeholder="Cari kategori..." value="{{ request('q') }}">
        </div>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $index => $k)
                <tr>
                    <td>{{ $kategori->firstItem() + $index }}</td>
                    <td>{{ $k->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <td>
        <form action="{{ route('category.destroy', ['kategori' => $k->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">Hapus</button>
        </form>
    </td>


    <!-- Tampilkan pagination -->
    {{ $kategori->appends(request()->except('page'))->links() }}
@endsection
