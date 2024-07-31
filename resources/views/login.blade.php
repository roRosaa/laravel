<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-4.4.1-dist/css/bootstrap.min.css') }}">
    <!-- Let's include jQuery before Bootstrap.js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('bootstrap-4.4.1-dist/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap.js requires jQuery -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            width: 300px;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="card">
        <h5 class="card-title">Login</h5>
        <form action="{{ route('proseslogin') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">LOGIN</button>
            </div>
        </form>
    </div>
</body>
</html>
