@extends("layouts.default")

@section("title") @parent New Product Page @stop

@section("content")
    <form method="post" action="{{ route('product.save')}}" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field()}}
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="form-group">
            <label>name</label>
            <input type="text" name="name" value="{{ $product->name ?: old('name') }}" class="form-control @if($errors->has('name')) is-invalid @endif" />

            @if($errors->has("name"))
                <div class="invalid-feedback">
                    {{$errors->first("name")}}
                </div>
            @endif

        </div>

        <div class="form-group">
            <label>Categories</label><br/>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                        @if($product->category_id === $category->id) selected="selected" @endif> {{ $category->name }} 
                    </option>
                @endforeach 
            </select>
        </div>

        <div class="form-group">
            <label>Description</label><br/>
            <textarea name="description" class="form-control @if($errors->has('description')) is-invalid @endif">{{ $product->description ?: old('description') }}</textarea>

            @if($errors->has("description"))
                <div class="invalid-feedback">
                    {{$errors->first("description")}}
                </div>
            @endif

        </div>

        <div class="form-group">
            <label>Size</label><br/>
            <input type="text" name="size" value="{{ $product->size ?: old('size') }}" class="form-control @if($errors->has('size')) is-invalid @endif" />

            @if($errors->has("size"))
                <div class="invalid-feedback">
                    {{$errors->first("size")}}
                </div>
            @endif

        </div>

        <div class="form-group">
            <label>Image</label><br/>
            <input type="file" name="image" class="form-control @if($errors->has('image')) is-invalid @endif" />

            @if($errors->has("image"))
                <div class="invalid-feedback">
                    {{$errors->first("image")}}
                </div>
            @endif

        </div>

        <input type="submit" name="submit" @if($product->exists) value="Save" @endif value="Add Product" class="btn btn-success">
    </form>
@stop

@section("sidebar")
    <a href="{{ route('product.index') }}" class="btn btn-success">All Products</a>
@stop
