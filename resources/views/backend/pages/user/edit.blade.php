@extends('backend.layout.backendMaster')
@section('title', 'Users')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4> @yield('title')</h4>
                    </div>
                    <div class="card-body">

                        {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put']) !!}
                        {{ Form::label('name', 'Name') }}
                        {!! Form::text('name', null, ['class' => 'form-control form-control-sm']) !!}
                        {{ Form::label('email', 'Email', ['class' => 'mt-4']) }}
                        {!! Form::text('email', null, ['class' => 'form-control form-control-sm']) !!}
                        {{ Form::label('role', 'Role', ['class' => 'mt-4']) }}
                        <select name="role" id="" class="form-control form-control-sm">
                            @foreach ($role as $item)
                                <option value="{{ $item->id }}" @if (in_array($item->id, $data)) selected @endif>
                                    {{ $item->name }}</option>
                            @endforeach

                        </select>
                        {!! Form::button('update', [
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
