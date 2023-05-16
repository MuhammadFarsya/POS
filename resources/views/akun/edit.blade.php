@extends('layout.index')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-succes">
                Edit User
            </div>
            <div class="card-body">
                <form action="{{ url('akun/' . $view->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleInputText1" name="name" value="{{ $view->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ $view->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                    </div>
                    <div class="d-grid gap-2 d-md-block">
                        <a href="{{ url('akun') }}" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary" type="button">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
