@include('modal.destroy-modal')
@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h3 class="page-header">User Management</h3>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="text-center">No</th>
                <th>Email</th>
                <th>Type of User</th>
                <th></th>
            </tr>
            <?php $i=1 ?>
            @forelse ($users as $user)
            <tr>
                <td class="text-center">{{ $i }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->type }}</td>
                <td>
                    @if($user->id)
                    <a href="{{ action('UserController@edit', $user->id) }}" class="btn btn-success btn-xs">Edit</a>
                    <a href="{{ action('UserController@destroy', $user->id) }}" class="btn btn-danger btn-xs" id="confirm-modal">Delete</a>
                    @endif
                </td>
            </tr>
            <?php $i++; ?>
            @empty
            <tr>
                <td colspan="6">Looks like there is no user available.</td>
            </tr>
            @endforelse
        </table>
    </div>
</div><!-- .row -->

<div class="row">
    <div class="col-md-8 col-md-offset-2 form-horizontal">
        <h3 class="page-header">Create New User</h3>
        {!! Form::open(['action' => 'UserController@store', 'class' => 'create']) !!}
            <div class="form-group row">
                <label for="email" class="col-md-4 control-label">Email</label>
                <div class="col-md-8">
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
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
                {!! Form::button('Create User', ['type' => 'submit', 'name' => 'submit', 'value' => 'submit', 'class' => 'btn manage']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div><!-- .row -->

@endsection
