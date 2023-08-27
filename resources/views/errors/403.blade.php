{{-- @extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}
<!DOCTYPE html>
<html>
<head>
    <title>Yetkisiz Erişim</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #e74c3c;
        }
        p {
            margin-top: 10px;
            color: #333;
        }
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Yetkisiz İşlem</h1>
        <p>Bu işlemi gerçekleştirmek için yeterli yetkiniz bulunmuyor.</p>
        <a href="#"   onclick="return window.history.back()" class="btn-back">Geri Dön</a>
    </div>
</body>
</html>
