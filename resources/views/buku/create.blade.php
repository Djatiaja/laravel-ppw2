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
@if($errors->any())
{{ implode('', $errors->all('<div>:message</div>')) }}
@endif

        <form action="{{route('buku.store')}}" class="d-flex justify-content-center mt-5 gap-4" method="post" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td><label for="judul">Judul </label></td>
                    <td><input type="text" name="judul" id="judul" required></td>
                </tr>
                <tr>
                    <td><label for="penulis">Penulis </label></td>
                    <td><input type="text" name="penulis" id="penulis" required></td>
                </tr>
                <tr>
                    <td><label for="harga">Harga </label></td>
                    <td><input type="number" inputmode="numeric" name="harga" id="harga" min="0" required></td>
                </tr>
                <tr>
                    <td><label for="tanggal_terbit">Tanggal Terbit </label></td>
                    <td><input type="date" name="tanggal_terbit" id="tanggal_terbit" required></td>
                </tr>
                <tr>
                    <td><label for="sampul_buku"> </label>Sampul Buku</td>
                    <td><input type="file" name="sampul_buku" id="sampul_buku" accept="image/*"></td>
                </tr>
                <tr>
                    <td><button type="submit">Simpan</button></td>
                </tr>

            </table>
        </form>
    </div>
</body>

</html>