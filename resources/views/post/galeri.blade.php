@extends('layouts.app')
@section ('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Galeri</span>
                <a href="{{route('post.create')}}" class="btn btn-success">Add</a> <!-- Tombol Add di sebelah kanan -->
            </div>
            <div class="card-body">
                <div class="row d-flex justify-content-center align-items-center">
                    @if(count($data) > 0)
                    @foreach ($data as $post)
                    <div class="col-sm-2 mb-4">
                        <div>
                            <a class="example-image-link" href="{{asset('storage/'.$post->gambar ) }}"
                                data-lightbox="roadtrip" data-title="{{$post->deskripsi}}">
                                <img class="example-image img-fluid mb-2" src="{{asset('storage/'.$post->gambar )}}"
                                    alt="image-1" />
                            </a>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{route('post.update',$post->id)}}" class="btn btn-primary btn-sm">Update</a>
                            <form action="{{ route('post.delete', $post->id) }}" method="POST"
                                onsubmit="return confirm('Apakah anda yakin ingin menghapus gambar ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h3>Tidak ada data.</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection