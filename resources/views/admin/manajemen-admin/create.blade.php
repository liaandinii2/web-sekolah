@extends('admin.layout')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="nama">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="form-group mb-3">
                    <label for="nama">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>

                <button type="submit" class="btn btn-primary d-block mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection
