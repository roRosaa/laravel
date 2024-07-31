<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buah;
use Illuminate\Http\Request;

class BuahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data  = Buah::all();
        return view('data-buah',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah-buah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Buah::create([
            'nama_buah'=>$request->nama,
            'stok_buah'=>$request->stok,
            'harga_buah'=>$request->harga,
        ]);
        return redirect('buah');
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
        $data = Buah::findOrFail($id);
        return view('edit-buah',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fin = Buah::findOrFail($id);
        $data = ([
            'nama_buah'=>$request->nama,
            'stok_buah'=>$request->stok,
            'harga_buah'=>$request->harga,
        ]);
        $fin->update($data);
        return redirect('buah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Buah::findOrFail($id);
        $data->delete();
        return redirect('buah');
    }
}
