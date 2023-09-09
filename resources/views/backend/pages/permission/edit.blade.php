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
                        {!! Form::model($permission, ['route' => ['permission.update', $permission], 'method' => 'put']) !!}
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, [
                            'class' => 'form-control form-control-sm',
                            'placeholder' => 'Enter permission name',
                        ]) !!}
                        {!! Form::button('Update', ['class' => 'btn btn-sm btn-success mt-4', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
