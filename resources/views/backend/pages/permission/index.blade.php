@extends('backend.layout.backendMaster')
@section('title', 'Add Permission')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        @yield('title')
                    </div>
                    <div class="card-body">
                        <table class="table table-striped  table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permission as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <div class="d-inline-flex">
                                                <a href="{{ route('permission.edit', $item->id) }}">
                                                    <button class="btn btn-success btn-sm me-2">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </button>
                                                </a>
                                                {!! Form::open([
                                                    'route' => ['permission.delete', $item->id],
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

    @if (Session::has('msg'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: '<?php echo session::get('cls'); ?>',
                title: '<?php echo session::get('msg'); ?>',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
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
