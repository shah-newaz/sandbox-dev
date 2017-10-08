@extends("layouts.default")

@section("title") @parent New Category Page @stop

@section("content")

    <form method="post" action="{{ route('category.save') }}" class="form-horizontal">
        {{ csrf_field()}}
        <input type="hidden" name="id" value="{{ $category->id }}">
        <div class="form-group">
            <label>name</label>
            <input type="text" name="name" value="{{ $category->name ?: old('name') }}" class="form-control @if($errors->has('name')) is-invalid @endif" />

            @if($errors->has("name"))
                <div class="invalid-feedback">
                    {{$errors->first("name")}}
                </div>
            @endif

        </div>

        <div class="form-group">
            <label>Description</label><br/>
            <textarea name="description" class="form-control @if($errors->has('description')) is-invalid @endif">{{ $category->description ?: old('description') }}</textarea>

            @if($errors->has("description"))
                <div class="invalid-feedback">
                    {{$errors->first("description")}}
                </div>
            @endif
        </div>

        <input type="submit" @if($category->exists) value="Edit" @endif value="Add Product" class="btn btn-success">
    </form>
@stop

@section("sidebar")
    <a href="{{ route('category.index') }}" class="btn btn-success">All Categories</a>
@stop
