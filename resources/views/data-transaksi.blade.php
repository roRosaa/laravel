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
       
            overflow-y: auto;
          
        }

     
        .sidebar a {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: background-color 0.3s ease;
           
        }

      
        .sidebar a.active {
            background-color: #28a745;
           
        }

        
        .sidebar a:hover {
            background-color: #495057;
            
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
        <a href="{{ route('buah') }}">Buah</a>
        <a href="{{ route('transaksi') }}" class="active">Transaksi</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary btn-block mt-3">Logout</button>
        </form>
    </div>

    <!-- Main content area -->
    <div class="content">
        <div class="container">
            <div class="bg-light rounded p-4">
                <h1 class="mb-4">Transaksi</h1>
                <form action="{{ route('addtransaksi') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id_buah" class="form-label">Buah</label>
                        <select name="id_buah" id="id_buah" class="form-control">
                            @foreach ($data2 as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_buah }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Beli</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="Tambah Jumlah Beli"
                            id="jumlah" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl" class="form-label">Tanggal Pembelian</label>
                        <input type="date" name="tgl" class="form-control" id="tgl" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>

                <div class="mt-5">
                    <h2 class="mb-4">Daftar Transaksi</h2>
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Buah</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jumlah Beli</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->buah->nama_buah }}</td>
                                <td>{{ $item->tgl_transaksi }}</td>
                                <td>{{ $item->jumlah_beli }}</td>
                                <td>{{ $item->jumlah_bayar }}</td>
                                <td>
                                    <form action="{{ route('deletetransaksi', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" value="{{ $item->id_buah }}" name="id_buah">
                                        <input type="hidden" value="{{ $item->jumlah_beli }}" name="jumlah">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td>Total Harga</td>
                                <td>
                                    @php
                                    $total_harga = 0;
                                    foreach ($data as $item) {
                                    $total_harga += $item->jumlah_bayar;
                                    }
                                    echo $total_harga;
                                    @endphp
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="mt-3">
                    <a href="{{ route('struk') }}" class="btn btn-success" target="_blank">Cetak Struk</a>
                    <a href="{{ route('selesai') }}" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menyelesaikan Pembayaran?')" target="_blank">Selesaikan Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
