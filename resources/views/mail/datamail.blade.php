<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .email-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background-color: #007bff;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            color: white;
            text-align: center;
        }

        .email-footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="email-container container">
        <div class="email-header">
            <h1>{{ $subject }}</h1>
        </div>

        <div class="email-body mt-4">
            <p>Hello {{ $name }},</p>
            <p>{{ $body }}</p>

            <p>Best regards,<br> {{ $email }}</p>

        </div>

        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Toko Buku. All rights reserved.</p>
        </div>
    </div>

</body>

</html>