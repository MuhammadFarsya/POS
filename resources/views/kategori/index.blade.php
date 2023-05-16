@extends('layout.index')
@section('content')
    <br>
    <h2>Datatable Category</h2>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#Modal-Tambah">
                    Create Product
                </button>
                {{-- <a href="{{ url('barang/create') }}" class="btn btn-primary mb-3">Create New Product</a> --}}
                <table id="datatable" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Category</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($view as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->kd_brg }}</td>
                                <td>{{ $data->kategori }}</td>
                                <td>
                                    <a href="{{ route('kategori.edit', $data->id) }}" class="btn btn-warning"
                                        data-bs-toggle="modal" data-bs-target="#Modal-Edit-{{ $data->id }}"><span
                                            data-feather="edit"></span></a>
                                    <form action="{{ route('kategori.destroy', $data->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are You Sure?')"><span data-feather="trash-2"></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah-->
    <div class="modal fade" id="Modal-Tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Category Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('kategori') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputText1" class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" id="exampleInputText1" name="kd_brg" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputText2" class="form-label">Category</label>
                            <input type="text" class="form-control" id="exampleInputText2" name="kategori" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($view as $datas)
        <!-- Modal Edit-->
        <div class="modal fade" id="Modal-Edit-{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Category Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('kategori/' . $datas->id) }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="mb-3">
                                <label for="exampleInputText1" class="form-label">Kode Barang</label>
                                <input type="text" class="form-control" id="exampleInputText1" name="kd_brg"
                                    value="{{ $datas->kd_brg }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputText2" class="form-label">Category</label>
                                <input type="text" class="form-control" id="exampleInputText2" name="kategori"
                                    value="{{ $datas->kategori }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
