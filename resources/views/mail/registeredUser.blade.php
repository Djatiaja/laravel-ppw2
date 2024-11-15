<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang, {{ $user->name }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .email-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background-color: #28a745;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            color: white;
            text-align: center;
        }

        .email-body {
            margin-top: 20px;
        }

        .email-footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>

<body>

    <div class="email-container container">
        <div class="email-header">
            <h1>Selamat Datang, {{ $user->name }}!</h1>
        </div>

        <div class="email-body">
            <p>Halo {{ $user->name }},</p>

            <p>Terima kasih telah mendaftar di Toko Buku Kami! Kami sangat senang menyambut Anda sebagai bagian dari
                komunitas pencinta buku kami.</p>

            <p>Berikut adalah detail registrasi Anda:</p>
            <ul>
                <li><strong>Email:</strong> {{ $user->email }}</li>
                <li><strong>Tanggal Registrasi:</strong> {{ $user->created_at->format('d F Y, H:i') }}</li>
            </ul>

            <p>Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk membalas email ini.</p>

            <p>Selamat membaca dan semoga hari Anda menyenangkan!</p>
        </div>

        <div class="email-footer">
            <p>&copy; 2024 Toko Buku Kami. Semua hak dilindungi.</p>
        </div>
    </div>

</body>

</html>