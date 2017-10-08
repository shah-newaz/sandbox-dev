@extends("layouts.default")

@section("title") @parent Home @stop

@section("content")
    <h3>Products</h3>
    <hr />

    <div class="row">

        @foreach($products as $product)
            <div class="col-md-3">
                <img src="{{ productsImage($product->image) }}" class="img-thumbnail">
                <p>{{ $product->name }}</p>
            </div>
        @endforeach    
    </div>

        {{ $products->links("vendor.pagination.bootstrap-4") }}
@stop

@section("sidebar")
    <h3>Categories</h3>


    <table class="table table-striped table-hover table-bordered">
        <thead>
            <th>Name</th>
        </thead>

        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
            </tr>
        @endforeach    
    </table>
@stop