<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $data = Barang::all();
        return view('index',compact('data'));
    }

    function transaksi(){
        return view('transaksi');
    }

    function create(Request $request){
        Barang::create([
            'nama_barang'=>$request->nama,
            'kategori'=>$request->kategori,
            'harga'=>$request->harga,
            'stok'=>$request->stok
        ]);
        return redirect('index')->with('success','data berhasil ditambah!');
    }

    function edit(Request $request, $id){
        $item = Barang::findOrFail($id);
        $data = ([
            'nama_barang'=>$request->nama,
            'kategori'=>$request->kategori,
            'harga'=>$request->harga,
            'stok'=>$request->stok
        ]);
        $item->update($data);
        return redirect('index')->with('success','data berhasil ditambah!');
    }
    function delete($id){
        $item = Barang::findOrFail($id);
        $item->delete();
        return back();
    }
}
