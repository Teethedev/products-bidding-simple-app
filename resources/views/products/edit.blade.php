@extends('layouts.app')

@section('content')

<h1>Edit {{ $product->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($product, array('route' => array('products.update', $product->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('sku', 'Sku') }}
        {{ Form::text('sku', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('price', 'Price') }}
        {{ Form::text('price', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the Product!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection