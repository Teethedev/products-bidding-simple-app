@extends('layouts.app')

@section('content')

<h1>Create a Product</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'dashboard/products')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('sku', 'Sku') }}
        {{ Form::text('sku', Input::old('sku'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('price', 'Price') }}
        {{ Form::text('price', Input::old('price'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create the Product', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection