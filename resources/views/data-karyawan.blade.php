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
            background-color: #28a745 
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
        <a href="{{ route('karyawan') }}"  class="active">Karyawan</a>
        <a href="{{ route('buah') }}">Buah</a>
        <a href="{{ route('transaksi') }}">Transaksi</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary btn-block mt-3">Logout</button>
        </form>
    </div>

    <!-- Main content area -->
    <div class="content">
        <div class="container-fluid">
            <div class="bg-body-tertiary rounded p-5">
                <div class="col-sm-8 mx-auto">
                    <a href="{{ route('adkaryawan') }}" class="btn btn-primary mt-5">+Tambah Karyawan</a>
                    <table class="table table-hover mt-5">
                        <thead class="table-primary">
                            <tr>
                                <th scope="row">No</th>
                                <th scope="row">Nama Karyawan</th>
                                <th scope="row">Alamat</th>
                                <th scope="row">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                            <tr>
                                <td scope="col">{{ $loop->iteration }}</td>
                                <td scope="col">{{ $item->nama_karyawan }}</td>
                                <td scope="col">{{ $item->alamat_karyawan }}</td>
                                <td scope="col">
                                    <form action="{{ route('deletekaryawan',['id'=>$item->id]) }}" method="POST">
                                        <a href="{{ route('editkaryawan',['id'=>$item->id]) }}" class="btn btn-success">Edit</a>
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
