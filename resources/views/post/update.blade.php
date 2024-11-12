@extends('layouts.app')

@section ('content')
<form action="{{route('post.save', $post->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul', $post->judul) }}"
            required>
    </div>

    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" class="form-control" rows="5"
            required>{{ old('deskripsi', $post->deskripsi) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="gambar" class="form-label">Upload Gambar</label>
        <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*">
        @if($post->gambar)
        <p>Current Image: <img src="{{ asset('storage/' . $post->gambar) }}" alt="Gambar" width="100"></p>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection