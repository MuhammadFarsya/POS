@extends('layout.index')
@section('content')
    <div class="container mt-5">
        <div class="card ">
            <h5 class="card-header bg-info">Create User</h5>
            <div class="card-body">
                <form action="{{ url('akun') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleInputText1" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                    </div>
                    <div class="d-grid gap-2 d-md-block">
                        <a href="{{ url('akun') }}" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary" type="button">Simpan</button>
                    </div>
                    {{-- <select class="form-select" id="floatingSelect">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
{{-- @push('js')
    <script>
        $(document).ready(function() {
            $('#floatingSelect').select2();
        });
    </script>
@endpush --}}
