@extends('admin.layout')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" class="form-control" id="judul" value="{{ $post->judul }}" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-control" required>
                        <option value="">Pilih kategori</option>
                        @foreach ($categories as $kategori)
                            <option value="{{ $kategori->id }}" {{ $post->kategori_id == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="">Pilih status</option>
                        <option value="publish" {{ $post->status == 'publish' ? 'selected' : '' }}>Publish</option>
                        <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="isi">Isi</label>
                    <textarea name="isi" id="isi" class="form-control" required>{{ $post->isi }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary d-block mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection
