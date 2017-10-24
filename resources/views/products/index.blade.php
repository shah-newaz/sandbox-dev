@extends("layouts.default")

@section("title") @parent Products Page @stop

@section("content")
        <h3>All Products: </h3>
        <hr/>

        <form method="get" action="{{ route('product.index') }}">
            <div class="form-group container">
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" name="product" value="{{ Request::get('product') }}" class="form-control col-md-10" placeholder="Search By Product">
                    </div>
                    <div class="col-md-5">
                        <select name="category" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if (intval(Request::get('category'))  === $category->id ) selected = "selected" @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" value="Search" class="form-control btn btn-primary">
                    </div>
                </div>
            </div>
        </form>

        <br />

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <th>Name</th>
                <th>Category</th>
                <th>Size</th>
                <th>Actions</th>
            </thead>

            @foreach($products as $product)
             <tr>
                 <td>{{ $product->name }}</td>
                 <td>{{ $product->category->name }}</td>
                 <td>{{ $product->size }}</td>
                 <td>
                     <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                     <a href="#" data-toggle="modal" data-target="#deleteModal{{$product->id}}" class="btn btn-danger">Delete</a>
                 </td>
             </tr>


                 <!-- modal starts -->
                 <div class="modal fade" id="deleteModal{{$product->id}}">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <form class="form-group" method="post" action="{{ route('product.delete', $product->id) }}">
                                {{csrf_field()}}
                                 <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                                     <h4 class="modal-title"> Delete Product </h4>
                                 </div>
                 
                                 <div class="modal-body">
                                     <p>Are You Sure That You Want To Delete <code> {{$product->name}} </code></p>
                                 </div>
                 
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                     <input type="submit" class="btn btn-danger" value="Delete">
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
                 <!-- modal ends -->

            @endforeach    
        </table>

        {{ $products->links("vendor.pagination.bootstrap-4") }}
@stop

@section("sidebar")
    <a href="{{ route('product.new')}}" class="btn btn-success"> Add New Product</a>
    <a href="{{ route('product.download')}}" class="btn btn-success"> Download PDF</a>
@stop