@extends('layout.index')
@section('content')
    <br>
    <h2>Datatable Product Barang</h2>
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
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($view as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->category->kd_brg }}</td>
                                <td>{{ $data->kategori }}</td>
                                <td>{{ $data->nama_brg }}</td>
                                <td>{{ $data->harga }}</td>
                                <td>{{ $data->jumlah }}</td>
                                <td>{{ $data->satuan }}</td>
                                <td>
                                    <a href="{{ route('barang.edit', $data->id) }}" class="btn btn-warning"
                                        data-bs-toggle="modal" data-bs-target="#Modal-Edit-{{ $data->id }}"><span
                                            data-feather="edit"></span></a>
                                    <form action="{{ route('barang.destroy', $data->id) }}" method="POST" class="d-inline">
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

    <!-- Modal Tambah -->
    <div class="modal fade" id="Modal-Tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Insert Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('barang') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="exampleInputText1" class="form-label">Kode Barang</label>
                                <select class="form-select kd_brg" id="kd_brg" name="category_id">
                                    <option selected disabled>Pilih Salah Satu</option>
                                    @foreach ($dt_category as $data)
                                        <option value="{{ $data->id }}">{{ $data->kd_brg }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputText2" class="form-label">Category Barang</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputText2" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="exampleInputText2" name="nama_brg" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputText3" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="exampleInputText3" name="harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputText4" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="exampleInputText4" name="jumlah" value="0"
                                readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputText4" class="form-label">Satuan</label>
                            <select class="form-select" id="satuan" name="satuan" aria-label="Default select example">
                                <option selected disabled>Pilih Salah Satu</option>
                                <option value="Pcs">Pcs</option>
                                <option value="Kotak">Kotak</option>
                                <option value="Box">Box</option>
                                <option value="Dus">Dus</option>
                            </select>
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
        <!-- Modal Edit -->
        <div class="modal fade" id="Modal-Edit-{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Insert Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('barang/' . $datas->id) }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="exampleInputText1" class="form-label">Kode Barang</label>
                                    <select class="form-select kd_brg" id="kd_brg1" name="category_id">
                                        <option value="{{ $datas->category_id }}">{{ $datas->category->kd_brg }}</option>
                                        <option disabled>Pilih Salah Satu</option>
                                        @foreach ($dt_category as $data)
                                            <option value="{{ $data->id }}">{{ $data->kd_brg }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputText2" class="form-label">Category Barang</label>
                                <input type="text" class="form-control" id="kategori1" name="kategori"
                                    value="{{ $datas->kategori }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputText2" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="exampleInputText2" name="nama_brg"
                                    value="{{ $datas->nama_brg }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputText3" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="exampleInputText3" name="harga"
                                    value="{{ $datas->harga }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputText4" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="exampleInputText4" name="jumlah"
                                    value="0" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputText4" class="form-label">Satuan</label>
                                <select class="form-select" id="kd_brg" name="satuan"
                                    aria-label="Default select example">
                                    <option value="{{ $datas->id }}">{{ $datas->satuan }}</option>
                                    <option disabled>Pilih Salah Satu</option>
                                    <option value="Pcs">Pcs</option>
                                    <option value="Kotak">Kotak</option>
                                    <option value="Box">Box</option>
                                    <option value="Dus">Dus</option>
                                </select>
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
@push('js')
    {{-- Ajax Autofill Form --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('change', '#kd_brg', function() {

                var nama_id = $(this).val();
                // console.log(nama_id);

                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('findNama') !!}',
                    data: {
                        'id': nama_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#kategori').val(data.kategori);
                    },
                    error: function() {

                    }
                })
            });
            $(document).on('change', '#kd_brg1', function() {

                var nama_id = $(this).val();
                // console.log(nama_id);

                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('findNama') !!}',
                    data: {
                        'id': nama_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#kategori1').val(data.kategori);
                    },
                    error: function() {

                    }
                })
            });
        });
    </script>

    <script>
        $('#kd_brg').select2({
            dropdownParent: '#Modal-Tambah'
        });
    </script>
@endpush
