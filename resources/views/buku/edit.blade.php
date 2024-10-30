<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <form action="{{ route('buku.update', $buku->id) }}" class="mx-auto mt-5 p-4 border rounded shadow-sm"
            style="max-width: 600px;" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" value="{{ $buku->judul }}" required>
            </div>

            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" name="penulis" id="penulis" value="{{ $buku->penulis }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga" id="harga" min="0" value="{{ $buku->harga }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="tanggal_terbit" class="form-label">Tanggal Terbit</label>
                <input type="date" class="form-control" name="tanggal_terbit" id="tanggal_terbit"
                    value="{{ $buku->tanggal_terbit }}" required>
            </div>

            <div class="mb-3">
                <label for="sampul_buku" class="form-label">Sampul Buku</label>
                <input type="file" class="form-control" name="sampul_buku" id="sampul_buku" accept="image/*">
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFfIDc5QVnRATaCFL3w7JOntg6E2R9G/rW3r56rsIMVbvbNf0YG5tCtRS5" crossorigin="anonymous">
        </script>
</body>

</html>