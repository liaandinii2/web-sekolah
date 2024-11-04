@extends('admin.layout')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/posts/{{ $posts->id }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="title">judul</label>
                    <input type="text" name="title" class="form-control" id="title" required value="{{ $posts->title }}">
                </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-3">
                            <label for="category_id">kategori</label>
                            <input type="category_id" name="category_id" class="form-control" required>
                    <option value="">pilih kategori </option>
                    @foreach ($categories as $category)
                    <option value ="{{  $category=id  }}">{{ $category->title }}</option>
                    <option value ="{{  $category=id }}">{{ $category->title }}</option>
                                @endforeach
                </div>
            </div>

            <div class="col">
                <div class="form-group mb-3">
                    <label for="status">kategori</label>
                    <input type="status" name="status" class="form-control" required>
                    <option value="">pilih status</option>
                    <option value="publish">Publish</option>
                    <option value ="draft">Draft</option>

                </div>
            </div>
        </div>

                <div class="form-group mb-3">
                 <label for="content">Isi</label>
                 <textarea name="content" id="content" class="form-control" required>{{ $post->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary d-block mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection
