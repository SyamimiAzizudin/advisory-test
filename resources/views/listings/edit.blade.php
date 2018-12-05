@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2 form-horizontal">
        <h3 class="page-header">Update Listing</h3>
        {!! Form::model($listing, ['method' => 'PATCH','action' =>  ['ListingController@update', $listing->id], 'files' => true]) !!}
            <div class="form-group row">
                <label for="list_name" class="col-md-4 control-label">List Name</label>
    			{!! Form::text('list_name', null, ['placeholder' => 'List Name','class' => 'form-control col-md-5']) !!}
            </div>
            <div class="form-group row">
                <label for="distance" class="col-md-4 control-label">Distance</label>
    			{!! Form::number('distance', null, ['placeholder' => 'Distance', 'class' => 'form-control col-md-5', 'step' => '0.1']) !!}
            </div>
            <div class="pull-right">
                {!! Form::button('Update Listing', ['type' => 'submit', 'name' => 'submit', 'value' => 'submit', 'class' => 'btn manage']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div><!-- .row -->

@endsection