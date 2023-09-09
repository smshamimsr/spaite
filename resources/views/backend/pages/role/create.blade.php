@extends('backend.layout.backendMaster')
@section('title', 'Add Role')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5> @yield('title') </h5>
                        <a href="{{ route('role.index') }}">
                            <button class="btn btn-sm btn-primary"><i class="fas fa-list    "></i></button>
                        </a>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'role.store', 'method' => 'POST']) !!}
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, [
                            'class' => 'form-control form-control-sm',
                            'placeholder' => 'Enter role name',
                        ]) !!}
                        @error('name')
                            <p class="mb-0 text-danger position-absolute">
                                <small>{{ $message }}</small>
                            </p>
                        @enderror

                        <div class="row">
                            @foreach ($permission as $item)
                                <div class="col-lg-3 mt-2">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="checkbox" name="permision[]"
                                            value="{{ $item->id }}" id="flexCheckDefault_{{ $item->id }}">
                                        <label class="form-check-label" for="flexCheckDefault_{{ $item->id }}">
                                            {{ $item->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {!! Form::button('submit', ['class' => 'btn btn-sm btn-primary mt-4', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
