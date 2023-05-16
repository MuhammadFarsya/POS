@extends('layout.index')
@section('content')
    <div class="container mt-5">
        <div class="card ">
            <h5 class="card-header bg-info">Create Product</h5>
            <div class="card-body">
                <form action="{{ url('barang/' . $view->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" id="exampleInputText1" name="kd_brg"
                            value="{{ $view->kd_brg }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputText2" class="form-label">Category Barang</label>
                        <input type="text" class="form-control" id="exampleInputText2" name="nama_brg" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputText2" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="exampleInputText2" name="nama_brg"
                            value="{{ $view->nama_brg }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputText3" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="exampleInputText3" name="harga"
                            value="{{ $view->harga }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputText4" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="exampleInputText4" name="jumlah"
                            value="{{ $view->jumlah }}" required>
                    </div>
                    <div class="d-grid gap-2 d-md-block">
                        <a href="{{ url('barang') }}" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary" type="button">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
