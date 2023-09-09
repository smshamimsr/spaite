@extends('backend.layout.backendMaster')
@section('title', 'Add Role')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4> @yield('title')</h4>
                        <a href="{{ route('role.create') }}">
                            <button class="btn btn-sm btn-success"><i class="fas fa-plus    "></i></button></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Role</th>
                                    <th>Permission</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($role as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @foreach ($item->permissions as $permission)
                                                <button class="btn btn-sm btn-info">{{ $permission->name }}</button>
                                            @endforeach

                                        </td>
                                        <td>
                                            <div class="d-inline-flex">
                                                <a href="{{ route('role.edit', $item->id) }}">
                                                    <button class="btn btn-success btn-sm me-2">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </button>
                                                </a>
                                                {!! Form::open([
                                                    'route' => ['role.destroy', $item->id],
                                                    'method' => 'delete',
                                                    'id' => 'delete_form_' . $item->id,
                                                ]) !!}
                                                {!! Form::button('<i class="fa-solid fa-trash"></i>', [
                                                    'class' => 'btn btn-sm btn-danger delete-btn',
                                                    'data-id' => $item->id,
                                                ]) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $('.delete-btn').on('click', function() {
            let id = $(this).attr('data-id')
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete_form_' + id).submit()
                }
            })
        })
    </script>
@endpush
