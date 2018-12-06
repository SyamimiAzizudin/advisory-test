@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2 form-horizontal">
        <h3 class="page-header" >Update User</h3>
        {!! Form::model($user, ['method' => 'PATCH','action' =>  ['UserController@update', $user->id], 'files' => true]) !!}
            <div class="form-group row">
                <label for="email" class="col-md-4 control-label">Email</label>
                <div class="col-md-8">
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-md-4 control-label">Type of User</label>
                <div class="col-md-8">
                    {{ Form::select('type', ['user' => 'User', 'administrator' => 'Administrator'], null, ['class' => 'form-control'], ['placeholder' => 'Select User']) }}
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 control-label">Password</label>
                <div class="col-md-8">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="confirm-password" class="col-md-4 control-label">Confirm Password</label>
                <div class="col-md-8">
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
                </div>
            </div>
            <div class="pull-right">
                {!! Form::button('Update User', ['type' => 'submit', 'name' => 'submit', 'value' => 'submit', 'class' => 'btn manage']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div><!-- .row -->

@endsection
