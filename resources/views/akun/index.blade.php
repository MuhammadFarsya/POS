@extends('layout.index')
@section('content')
    <br>
    <h2>Datatable User</h2>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ url('akun/create') }}" class="btn btn-primary mb-3">Create New User</a>
                <table id="datatable" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($view as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->password }}</td>
                                <td>
                                    <a href="{{ route('akun.edit', $data->id) }}" class="btn btn-warning"><span
                                            data-feather="edit"></span></a>
                                    <form action="{{ route('akun.destroy', $data->id) }}" method="POST" class="d-inline">
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endpush
