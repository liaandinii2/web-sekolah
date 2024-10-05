@extends('admin.layout')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama">judul</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                </div>
                <button type="submit" class="btn btn-primary d-block mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection
