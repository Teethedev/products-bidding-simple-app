@extends('frontend.layouts.headfooter')

@section('content')

<h1>Showing {{ $product->name }}</h1>

    <div class="jumbotron">
        <h2>{{ $product->name }}</h2>
        <p>
            <strong>Sku:</strong> {{ $product->sku }}<br>
            <strong>Description:</strong> {{ $product->description }}<br>
            <strong>Price:</strong> {{ $product->price }}<br>
            <strong>Views:</strong> {{ $product->product_stats->views }}
        </p>
    </div>
    @if (Session::has('message'))
      <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="container">
        <div class="col-md-8">
    <!-- if there are creation errors, they will show here -->
    @if (!isset($product->bid_placed))
    {{ HTML::ul($errors->all()) }}
    {{ Form::open(array('url' => 'frontend/bid', 'class' => '')) }}
        {{ Form::hidden('_method', 'POST') }}
        {{ Form::hidden('id', $product->id) }}
        <div class="form-group">
         {{ Form::label('email', 'Email') }}
         {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
         {{ Form::label('bid', 'Bid') }}
         {{ Form::text('bid', Input::old('bid'), array('class' => 'form-control')) }}
        </div>
        {{ Form::submit('Place Bid', array('class' => 'btn btn-warning')) }}
    {{ Form::close() }}
    @else
      <strong>Your bid:</strong> {{ $product->bid_placed->bid }}<br>
    @endif
    </di>

   

        <div class="col-md-12">
            <h2>All Bids</h2>
    <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Email</td>
            <td>Bid</td>
        </tr>
    </thead>
    <tbody>
    @foreach($all_bids as $key => $value)
        <tr>
            <td>{{ $value->email }}</td>
            <td>{{ $value->bid }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $all_bids->links() }}
</di>
</di>
@endsection