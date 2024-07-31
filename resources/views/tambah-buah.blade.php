<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Buah</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-4.4.1-dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap-4.4.1-dist/js/bootstrap.min.js') }}"></script>
    <style>
        
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #28a745;
            padding-top: 3.5rem;
            
        }

        
        .sidebar a {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

       
        .sidebar a.active {
            background-color: #adb5bd;
            
        }

        
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="navbar-brand text-white">TOKO BUAH</a>
        <a href="{{ route('karyawan') }}">Karyawan</a>
        <a href="{{ route('buah') }}" class="active">Buah</a>
        <a href="{{ route('transaksi') }}">Transaksi</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary btn-block mt-3">Logout</button>
        </form>
    </div>

    <!-- Main content area -->
    <div class="content">
        <div class="bg-body-tertiary rounded p-5">
            <div class="col-sm-8 mx-auto">
                <form action="{{ route('addbuah') }}" method="POST">
                    @csrf
                    <label for="">Nama buah</label>
                    <input type="text" name="nama" class="form-control" id="" required>
                    <br>
                    <label for="">Stok buah</label>
                    <input type="text" name="stok" class="form-control" id="" required>
                    <br>
                    <label for="">Harga buah</label>
                    <input type="text" name="harga" class="form-control" id="" required>
                    <br>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
