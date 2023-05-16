@extends('layout.index')
@section('content')
    <br>
    <h2>Datatable Product</h2>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ url('barangMasuk/create') }}" class="btn btn-primary mb-3">Create New Product</a>
                <table id="datatable" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($view as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->kd_brg }}</td>
                                <td>{{ $data->nama_brg }}</td>
                                <td>{{ $data->harga }}</td>
                                <td>{{ $data->jumlah }}</td>
                                <td>
                                    <a href="{{ route('barangMasuk.edit', $data->id) }}" class="btn btn-warning"><span
                                            data-feather="edit"></span></a>
                                    <form action="{{ route('barangMasuk.destroy', $data->id) }}" method="POST" class="d-inline">
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
@endsection
