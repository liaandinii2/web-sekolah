@extends('admin.layout')
@section('content')

<div class="container">
    <div class="card">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data"> <!-- Added enctype for file upload -->
                @csrf
                <div class="form-group mb-3">
                    <label for="galery_id">ID GALERY</label>
                    <select name="galery_id" class="form-control" id="galery_id" required>
                        <option value="">Pilih Galery ID</option>
                        @foreach($galeris as $galeri)
                            <option value="{{ $galeri->id }}" {{ old('galery_id') == $galeri->id ? 'selected' : '' }}>
                                {{ $galeri->post->judul ?? 'No Title' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="files">File</label>
                    <input type="file" name="files[]" class="form-control" id="files" multiple required> <!-- Changed to allow multiple uploads -->
                </div>

                <div class="form-group mb-3">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan judul foto" required>
                </div>

                <button type="submit" class="btn btn-primary d-block mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection
