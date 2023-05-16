@extends('layout.index')
@section('content')
    <div class="container mt-5">
        <div class="card ">
            <h5 class="card-header bg-info">Create Product</h5>
            <div class="card-body">
                <form action="{{ url('barang') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" id="category" name="nama_brg" required>
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
                        <input type="number" class="form-control" id="exampleInputText4" name="jumlah" required>
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
                        $('#category').val(data.category);
                    },
                    error: function() {

                    }
                })
            });
        });
    </script>
@endpush
