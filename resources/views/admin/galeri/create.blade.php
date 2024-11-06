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
            <form action="{{ route('galeri.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="post_id">ID POST</label>
                    <select name="post_id" class="form-control" id="post_id" required>
                        <option value="">Select Post</option>
                        @foreach($posts as $post)
                            <option value="{{ $post->id }}" {{ old('post_id') == $post->id ? 'selected' : '' }}>
                                {{ $post->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="position">Position</label>
                            <select name="position" id="position" class="form-control" required>
                                <option value="">Select Position</option>
                                @for ($i = 1; $i <= 4; $i++)
                                    <option value="{{ $i }}" {{ old('position') == $i ? 'selected' : '' }}>
                                      {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Nonactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-block mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection