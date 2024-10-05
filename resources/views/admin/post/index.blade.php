@extends('admin.layout')
@section('content')

<div class="card">
    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">+ posts</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Petugas</th>
                        <th scope="col">Status</th>
                        <th scope="col">Dibuat pada tanggal</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $loop->literation}}</td>
                        <td>{{ $post->title}}</td>
                        <td>{{ $post->category->title}}</td>
                        <td>{{ $post->user->name}}</td>
                        <td>{{ $post->status}}</td>
                        <td>{{ $post->created_at}}</td>
                        <td>
                            <a href="{{ route('posts.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            {{-- <a href="{{ route('posts.show', $user->id) }}" class="btn btn-info btn-sm">View</a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
