@extends("layouts.default")

@section("title") @parent Login @stop

@section("content")

    <form method="post" action="{{ route('login.post')}}" class="form-horizontal">
        {{ csrf_field()}}

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="{{ old('email') }}" class="form-control @if($errors->has('email')) is-invalid @endif" />

            @if($errors->has("email"))
                <div class="invalid-feedback">
                    {{$errors->first("email")}}
                </div>
            @endif

        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" />

            @if($errors->has("password"))
                <div class="invalid-feedback">
                    {{$errors->first("password")}}
                </div>
            @endif

        </div>

        <input type="submit" name="submit" value="Login" class="btn btn-success">
    </form>

@stop