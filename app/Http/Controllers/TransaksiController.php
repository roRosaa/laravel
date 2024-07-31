<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buah;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{

public function cetakStruk()
{
    $transaksiSebelumnya = Transaksi::all();

    $detail_transaksi = [];
    foreach ($transaksiSebelumnya as $transaksi) {
        $detail_transaksi[] = [
            'nama_buah' => $transaksi->buah->nama_buah,
            'jumlah_beli' => $transaksi->jumlah_beli,
            'harga' => $transaksi->buah->harga, 
            'total_harga' => $transaksi->jumlah_bayar
        ];
    }

    $total_bayar = $transaksiSebelumnya->sum('jumlah_bayar');


    $tanggal_transaksi = $transaksiSebelumnya->last()->tgl_transaksi;

    return view('struk', compact('tanggal_transaksi', 'detail_transaksi', 'total_bayar'));
}
    public function selesaikan(){
        Transaksi::truncate();
        return redirect('transaksi');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::with('buah')->get();
        $data2 = Buah::all();
        return view('data-transaksi',compact('data','data2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Buah::all();
        return view('tambah-transaksi',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $buah = Buah::findOrFail($request->id_buah);
    
    $total_harga = $buah->harga_buah * $request->jumlah;

    Transaksi::create([
        'id_buah' => $request->id_buah,
        'tgl_transaksi' => $request->tgl,
        'jumlah_beli' => $request->jumlah,
        'jumlah_bayar' => $total_harga, 
    ]);

    $buah->stok_buah -= $request->jumlah;
    $buah->save(); 

    return redirect('transaksi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function cancel(Request $request, string $id){
        $data = Buah::findOrFail($request->id_buah);
        $data->stok_buah += $request->jumlah;
        $data->save(); 
        $fin = Transaksi::findOrFail($id);
        $fin->delete();
        return redirect('transaksi');
    }

    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Transaksi::findOrFail($id);
        $data->delete();
        return redirect('transaksi');
    }
}
