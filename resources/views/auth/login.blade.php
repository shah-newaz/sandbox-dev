@extends("layouts.default")

@section("title") @parent New Category Page @stop

@section("content")

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="post" action="{{ route('user.login.post') }}" class="form-horizontal">
        {{ csrf_field()}}

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="john@example.com" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="" class="form-control">
        </div>

        <input type="submit" value="Login" class="btn btn-success">
    </form>
@stop
