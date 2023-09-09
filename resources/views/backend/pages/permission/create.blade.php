@extends('backend.layout.backendMaster')
@section('title', 'Add Permission')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        @yield('title')
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'permission.store', 'method' => 'POST']) !!}
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, [
                            'class' => 'form-control form-control-sm',
                            'placeholder' => 'Enter permission name',
                        ]) !!}
                        @error('name')
                            <p class="mb-0 text-danger position-absolute">
                                <small>{{ $message }}</small>
                            </p>
                        @enderror

                        {!! Form::button('submit', ['class' => 'btn btn-sm btn-primary mt-4', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
