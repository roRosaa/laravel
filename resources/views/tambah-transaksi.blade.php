<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap-4.4.1-dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap-4.4.1-dist/js/bootstrap.min.js') }}"></script>
    
    <title>Data Buah</title>
</head>
<body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary rounded bg-dark" aria-label="Thirteenth navbar example">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
              <a class="navbar-brand col-lg-3 me-0" href="#">TOKO BUAH</a>
              <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('karyawan') }}">Karyawan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="{{ route('buah') }}">Buah</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('transaksi') }}">Transaksi</a>
                  </li>
              </ul>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                    <button type="submit" class="btn btn-primary">Logout</button>
                </div>
            </form>
            </div>
          </div>
        </nav>
    
        <div>
          <div class="bg-body-tertiaryp-5 rounded">
            <div class="col-sm-8 mx-auto">

                <form action="{{ route('addtransaksi') }}" method="POST">
                    @csrf
                    <label for="">Buah</label>
                    <select name="id_buah" id="" class="form-control">
                        @foreach ($data as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_buah }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="">Tanggal Pembelian</label>
                    <input type="date" name="tgl" class="form-control" id="" required>
                    <br>
                    <label for="">Jumlah Beli</label>
                    <input type="number" name="jumlah" class="form-control" placeholder="Tambah Jumlah Beli" id="" required>
                    <br>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
              </p>
            </div>
          </div>
        </div>
</body>
</html>