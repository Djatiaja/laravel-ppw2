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
        <form action="{{route('buku.store')}}" class="d-flex justify-content-center mt-5 gap-4" method="post" >
            @csrf
            <table>
                <tr>
                    <td><label for="judul">Judul </label></td>
                    <td><input type="text" name="judul" id="judul" ></td>
                </tr>
                <tr>
                    <td><label for="penulis">Penulis </label></td>
                    <td><input type="text" name="penulis" id="penulis"  ></td>
                </tr>
                <tr>
                    <td><label for="harga">Harga </label></td>
                    <td><input type="number" inputmode="numeric" name="harga" id="harga" min="0"  ></td>
                </tr>
                <tr>
                    <td><label for="tanggal_terbit">Tanggal Terbit </label></td>
                    <td><input type="date" name="tanggal_terbit" id="tanggal_terbit" ></td>
                </tr>
                <tr >
                    <td><button type="submit">Simpan</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>