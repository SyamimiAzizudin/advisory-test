@include('modal.destroy-modal')
@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Listing Management</h3>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="text-center">No</th>
                <th>List Name</th>
                <th>Distance</th>
                <th>Created By</th>
                <th></th>
            </tr>
            <?php $i=1 ?>
            @forelse ($listings as $list)
            <tr>
                <td class="text-center">{{ $i }}</td>
                <td>{{ $list->list_name }}</td>
                <td>{{ $list->distance }}</td>
                <td>
                	@if($list->user_id != null)
                        {{ $list->users->id }}
                    @endif
                </td>
                <td>
                    @if($list->id)
                    <a href="{{ action('ListingController@edit', $list->id) }}" class="btn btn-success btn-xs">Edit</a>
                    <a href="{{ action('ListingController@destroy', $list->id) }}" class="btn btn-danger btn-xs" id="confirm-modal">Delete</a>
                    @endif
                </td>
            </tr>
            <?php $i++; ?>
            @empty
            <tr>
                <td colspan="6">Looks like there is no listing available.</td>
            </tr>
            @endforelse
        </table>
    </div>
</div><!-- .row -->

<div class="row">
    <div class="col-md-8 col-md-offset-2 form-horizontal">
        <h3 class="page-header">Create New Listing</h3>
        {!! Form::open(['action' => 'ListingController@store', 'class' => 'create']) !!}
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
                {!! Form::button('Create Listing', ['type' => 'submit', 'name' => 'submit', 'value' => 'submit', 'class' => 'btn manage']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div><!-- .row -->

@endsection