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
                <div class="row d-flex justify-content-center align-items-center" id="gallery-container">


                </div>
            </div>
        </div>
    </div>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
    $(document).ready(function () {
            $.ajax({
                url: '/api/gallery', 
                method: 'GET',
                success: function (response) {
                    response.forEach(function (post) {
                        $('#gallery-container').append(`
                    <div class="col-sm-2 mb-4">
                        <div>
                            <a class="example-image-link" href="/storage/${post.gambar}"
                                data-lightbox="roadtrip" data-title="${post.deskripsi}">
                                <img class="example-image img-fluid mb-2" src="/storage/${post.gambar}" alt="image-${post.id}" />
                            </a>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="/post/update/${post.id}" class="btn btn-primary btn-sm">Update</a>
                            <form action="/post/delete/${post.id}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus gambar ini?');">
                                <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                `);
                    });
                },
                error: function (error) {
                    console.error('Error fetching gallery:', error);
                }
            });
        });

</script>
@endsection