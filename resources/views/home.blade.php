@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

            </div>

            <!-- Menu button -->
            <div class="menu-btn">
                <div class="col-btn">
                    <a type="button" href="{{ url('/user') }}" class="btn btn-primary">User Management</a>
                </div>
                <div class="col-btn">
                    <a type="button" href="{{ url('/listing') }}" class="btn btn-primary">Listing Management</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
