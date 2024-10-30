@extends('layouts.app')

@section('style')
    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-danger {
            background-color: #f2dede;
            border-color: #ebccd1;
            color: #a94442;
        }
    </style>
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            {{ $message }}
        </div>
    @elseif ($message = Session::get('error'))
        <div class="alert alert-danger mt-3" role="alert">
            {{ $message }}
        </div>
    @endif

    <div class="container mt-4 mb-4">
        <table class="table table-striped ">
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
                        sampul buku
                    </th>
                    <th>
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $buku)
                    <tr>
                        <td> {{ $index + 1 }}</td>
                        <td> {{ $buku->judul }}</td>
                        <td> {{ $buku->penulis }}</td>
                        <td> {{ 'Rp. ' . number_format($buku->harga) }}</td>
                        <td> {{ \Carbon\Carbon::parse($buku->tanggal_terbit)->format('d-m-Y') }}</td>
                        <td>
                            @if (isset($buku->sampul_buku))
                                <img src="{{ asset('storage/' . $buku->sampul_buku) }}" alt="" width="50"
                                    height="50">
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('buku.delete', $buku->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">Delete</button>
                            </form>
                            <form action="{{ 'buku/update/'. $buku->id }}" method="GET">
                                <button type="submit" class="btn-secondary">update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4">
                        Jumlah buku
                    </td>
                    <td colspan="2">    
                        {{ $jumlah_data }}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        Total harga
                    </td>
                    <td colspan="2">
                        {{ 'Rp. ' . number_format($total_harga) }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="w-100 d-flex justify-content-center">
            <a href="{{ url('buku/tambah') }}">
                <button class="btn-primary rounded-3">
                    Tambah buku
                </button>
            </a>
        </div>
    </div>
@endsection('content')
