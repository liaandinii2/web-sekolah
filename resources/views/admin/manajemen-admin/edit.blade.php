@extends('admin.layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit User: {{ $user->name }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password (Kosongkan jika masih ingin menggunakan password lama)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary d-block mt-3">Simpan</button>
        </form>
    </div>
</div>

@endsection
