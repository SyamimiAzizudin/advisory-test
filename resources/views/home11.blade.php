@include('modal.destroy-modal')
@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">User Management </h3>
        
            <div class="col-md-10">

                <table class="table table-striped table-bordered">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Email</th>
                        <th>Role</th>
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
                            <a href="{{ action('HomeController@edit', $user->id) }}" class="btn btn-success btn-xs">Edit</a>
                            <a href="{{ action('HomeController@destroy', $user->id) }}" class="btn btn-danger btn-xs" id="confirm-modal">Delete</a>
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
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-8 col-md-offset-2 form-horizontal">
        <div class="page-header">
            <h3>Create New User</h3>
        </div>

        {!! Form::open(['action' => 'HomeController@store', 'class' => 'create']) !!}

                <div class="form-group row">
                    <label for="email" class="col-md-4 control-label">Email</label>
                    {!! Form::email('email', old('email'), ['class' => 'form-control form-create col-md-5', 'placeholder' => 'Email']) !!}
                </div>
                <div class="form-group row">
                    <label for="type" class="col-md-4 control-label">Type of User</label>
                    <select name="type" class="col-md-5 form-control">
                        <option value="">Select User</option>
                        @foreach($user_type as $id => $type)
                            <option value="{{ $id }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 control-label">Password</label>
                    {!! Form::password('password', ['class' => 'form-control form-create col-md-5', 'placeholder' => 'Password']) !!}
                </div>
                <div class="form-group row">
                    <label for="confirm-password" class="col-md-4 control-label">Confirm Password</label>
                    {!! Form::password('password_confirmation', ['class' => 'form-control form-create col-md-5', 'placeholder' => 'Confirm Password']) !!}
                </div>

                <div class="pull-right">
                    {!! Form::button('Create Account', ['type' => 'submit', 'name' => 'submit', 'value' => 'submit', 'class' => 'btn manage']) !!}
                </div>

            {!! Form::close() !!}

    </div>
</div>

@endsection
