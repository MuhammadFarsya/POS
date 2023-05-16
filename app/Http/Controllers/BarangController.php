<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = Barang::all();
        $dt_category = Category::all();
        return view('barang.index', compact('view', 'dt_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $create = Barang::all();
        $dt_category = Category::all();
        return view('Barang.index', compact('create', 'dt_category'));
    }
    public function findNama(Request $request)
    {
        $p = Category::select('kategori')->where('id', $request->id)->first();
        return response()->json($p);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Barang();
        $model->category_id = $request->category_id;
        $model->kategori = $request->kategori;
        $model->nama_brg = $request->nama_brg;
        $model->harga = $request->harga;
        $model->jumlah = $request->jumlah;
        $model->save();
        return redirect('barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update = Barang::find($id);
        $dt_category = Category::all();
        return view('barang.index', compact('update','dt_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Barang::find($id);
        $model->category_id = $request->category_id;
        $model->kategori = $request->kategori;
        $model->nama_brg = $request->nama_brg;
        $model->harga = $request->harga;
        $model->jumlah = $request->jumlah;
        $model->save();
        return redirect('barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $id)
    {
        $hapus = Barang::find($id);
        $hapus->delete();
        return redirect('barang');
    }
}
