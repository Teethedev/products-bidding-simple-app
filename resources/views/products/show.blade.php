@extends('layouts.app')

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