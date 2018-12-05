@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2 form-horizontal">
        <h3 class="page-header" >Update User</h3>
        {!! Form::model($user, ['method' => 'PATCH','action' =>  ['UserController@update', $user->id], 'files' => true]) !!}
            <div class="form-group row">
                <label for="email" class="col-md-4 control-label">Email</label>
                {!! Form::email('email', old('email'), ['class' => 'form-control col-md-5', 'placeholder' => 'Email']) !!}
            </div>
            <div class="form-group row">
                <label for="type" class="col-md-4 control-label">Type of User</label>
                {{ Form::select('type', ['user' => 'User', 'administrator' => 'Administrator'], null, ['class' => 'form-control col-md-5'], ['placeholder' => 'Select User']) }}
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 control-label">Password</label>
                {!! Form::password('password', ['class' => 'form-control col-md-5', 'placeholder' => 'Password']) !!}
            </div>
            <div class="form-group row">
                <label for="confirm-password" class="col-md-4 control-label">Confirm Password</label>
                {!! Form::password('password_confirmation', ['class' => 'form-control col-md-5', 'placeholder' => 'Confirm Password']) !!}
            </div>
            <div class="pull-right">
                {!! Form::button('Update User', ['type' => 'submit', 'name' => 'submit', 'value' => 'submit', 'class' => 'btn manage']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div><!-- .row -->

@endsection
