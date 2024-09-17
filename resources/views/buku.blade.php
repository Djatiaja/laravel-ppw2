<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body >
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    Nomor
                </th>
                <th>
                    Judul
                </th>
                <th>
                    Penulis
                </th>
                <th>
                    Harga
                </th>
                <th>
                    Tahun Terbit
                </th>
                <th>
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $buku)
                <tr>
                    <td> {{$loop->index +1}}</td>
                    <td> {{$buku->judul}}</td>
                    <td> {{$buku->penulis}}</td>
                    <td> {{"Rp. " . number_format($buku->harga)}}</td>
                    <td> {{  \Carbon\Carbon::parse($buku->tanggal_terbit)->format('d-m-Y') }}</td>
                    <td></td>
                </tr>
            @endforeach
            <tr >
                <td colspan="4">
                    Jumlah buku
                </td>
                <td colspan="2">
                    {{$jumlah_data}}
                </td>
            </tr>
            <tr >
                <td colspan="4">
                    Total harga
                </td>
                <td colspan="2">
                   {{"Rp. " . number_format($total_harga)}}
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>