@extends('admin.layout')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Tambah Kategori</h4>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Masukkan judul kategori">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

@endsection
