@extends('products.layouts.headfooter')

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
            <td>Views</td>
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
            <td>{{ $value->product_stats->views }}</td>
            <td>
                 <a href="{{ URL::to('dashboard/products/' . $value->id) }}"><i data-feather="maximize"></i></a>

                <a href="{{ URL::to('dashboard/products/' . $value->id . '/edit') }}"><i data-feather="edit"></i></a>

                {{ Form::open(array('url' => 'dashboard/products/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::button('<i data-feather="delete"></i>', ['type' => 'submit'] )  }}
                {{ Form::close() }}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $products->links() }}
@endsection