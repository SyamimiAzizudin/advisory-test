@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2 form-horizontal">
        <h3 class="page-header">Update Listing</h3>
        {!! Form::model($listing, ['method' => 'PATCH','action' =>  ['ListingController@update', $listing->id], 'files' => true]) !!}
            <div class="form-group row">
                <label for="list_name" class="col-md-4 control-label">List Name</label>
                <div class="col-md-8">
                    {!! Form::text('list_name', null, ['placeholder' => 'List Name','class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="distance" class="col-md-4 control-label">Distance</label>
                <div class="col-md-8">
                    {!! Form::number('distance', null, ['placeholder' => 'Distance', 'class' => 'form-control', 'step' => '0.1']) !!}
                </div>
            </div>
            <div class="pull-right">
                {!! Form::button('Update Listing', ['type' => 'submit', 'name' => 'submit', 'value' => 'submit', 'class' => 'btn manage']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div><!-- .row -->

@endsection