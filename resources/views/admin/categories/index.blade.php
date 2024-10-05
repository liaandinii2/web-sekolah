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
            <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Categories</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Dibuat Pada</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $index => $item)
                    <tr>
                        <th scope="row">{{ $categories->firstItem() + $index }}</th> <!-- Menampilkan nomor urut berdasarkan halaman -->
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <!-- Button to trigger modal -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                Edit
                            </button>

                            <!-- Delete button -->
                            <form action="{{ route('categories.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal for Editing -->
                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Kategori</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ route('categories.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="title">Judul</label>
                                    <input type="text" name="title" class="form-control" id="editTitle" value="{{ $item->title }}">
                                </div>
                                <button type="submit" class="btn btn-primary d-block mt-3">Simpan</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $categories->links() }} <!-- Pagination Links -->
        </div>

    </div>
</div>

@endsection
