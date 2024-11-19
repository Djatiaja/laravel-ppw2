@extends('layouts.app')
@section ('content')
<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" id="judul" name="judul" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" class="form-control" rows="5" required></textarea>
    </div>

    <div class="mb-3">
        <label for="gambar" class="form-label">Upload Gambar</label>
        <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection