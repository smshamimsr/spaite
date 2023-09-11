@extends('backend.layout.backendMaster')
@section('title', 'Users create')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4> @yield('title')</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'user.store', 'method' => 'post']) !!}
                        {{ Form::label('name', 'Name') }}
                        {!! Form::text('name', null, ['class' => 'form-control form-control-sm']) !!}
                        @error('name')
                            <p class="mb-0 position-absolute text-danger"><small>{{ $message }}</small></p>
                        @enderror
                        {{ Form::label('email', 'Email', ['class' => 'mt-4']) }}
                        {!! Form::text('email', null, ['class' => 'form-control form-control-sm']) !!}
                        @error('email')
                            <p class="mb-0 position-absolute text-danger"><small>{{ $message }}</small></p>
                        @enderror
                        {!! Form::label('password', 'Password', ['class' => 'mt-4']) !!}
                        {!! Form::password('password', ['class' => 'form-control form->control-sm']) !!}
                        @error('password')
                            <p class="mb-0 position-absolute text-danger"><small>{{ $message }}</small></p>
                        @enderror
                        {{ Form::label('role', 'Role', ['class' => 'mt-4']) }}
                        <select name="role" id="" class="form-control form-control-sm">
                            <option>Select Role</option>
                            @foreach ($roles as $item)
                                <option value="{{ $item->name }}"> {{ $item->name }}</option>
                            @endforeach
                            @error('role')
                                <p class="mb-0 position-absolute text-danger"><small>{{ $message }}</small></p>
                            @enderror

                        </select>
                        {!! Form::button('create', [
                            'class' => 'form-control btn btn-sm btn-primary form-control-sm mt-4',
                            'type' => 'submit',
                        ]) !!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
