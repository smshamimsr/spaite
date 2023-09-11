@extends('backend.layout.backendMaster')
@section('title', 'Users')

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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        @foreach ($item->roles as $role)
                                            <td class="w-75">{{ $role->name }}</td>
                                        @endforeach

                                        <td>
                                            <div class="d-inline-flex">
                                                @can('user edit')
                                                    <a href="{{ route('users.edit', $item->id) }}">
                                                        <button class="btn btn-success btn-sm me-2">
                                                            <i class="fa-regular fa-pen-to-square"></i>
                                                        </button>
                                                    </a>
                                                @endcan
                                                @can('delete user')
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
                                                @endcan

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
