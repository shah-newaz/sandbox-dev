@extends("layouts.default")

@section("title") @parent Categories Page @stop

@section("content")
        <h3>All Categories: </h3>
        <hr/>

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </thead>

            @foreach($categories as $category)
             <tr>
                 <td>{{ $category->name }}</td>
                 <td>{{ $category->description }}</td>
                 <td>
                     <a href="{{route('category.edit', $category->id)}}" class="btn btn-primary">Edit</a>
                     <a href="#" data-toggle="modal" data-target="#deleteModal{{$category->id}}" class="btn btn-danger">Delete</a>
                 </td>
             </tr>


                 <!-- modal starts -->
                 <div class="modal fade" id="deleteModal{{$category->id}}">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <form class="form-group" method="post" action="{{ route('category.delete', $category->id) }}">
                                {{csrf_field()}}
                                 <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                                     <h4 class="modal-title"> Delete Category </h4>
                                 </div>
                 
                                 <div class="modal-body">
                                     <p>Are You Sure That You Want To Delete <code> {{$category->name}} </code></p>
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

        {{ $categories->links("vendor.pagination.bootstrap-4")}}
@stop

@section("sidebar")
    <a href="{{ route('category.new')}}" class="btn btn-success"> Add New Category</a>
@stop