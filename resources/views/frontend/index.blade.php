@extends('frontend.layouts.headfooter')

@section('content')
<h1>All the Products</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Sku</td>
            <td>Price</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->sku }}</td>
            <td>{{ $value->price }}</td>
            <td>
                <a href="{{ URL::to('frontend/' . $value->id) }}"><i data-feather="maximize"></i></a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $products->links() }}
@endsection
