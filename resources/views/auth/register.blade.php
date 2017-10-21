@extends("layouts.default")

@section("title") @parent New Category Page @stop

@section("content")

    <form method="post" action="{{ route('user.register.post') }}" class="form-horizontal">
        {{ csrf_field()}}

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" placeholder="First Name" class="form-control @if($errors->has('first_name')) is-invalid @endif"" value="{{ old('first_name') }}">

            @if($errors->has("first_name"))
                <div class="invalid-feedback">
                    {{$errors->first("first_name")}}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" placeholder="Last Name" class="form-control @if($errors->has('last_name')) is-invalid @endif"" value="{{ old('last_name') }}">

            @if($errors->has("last_name"))
                <div class="invalid-feedback">
                    {{$errors->first("last_name")}}
                </div>
            @endif

        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="john@example.com" class="form-control @if($errors->has('email')) is-invalid @endif"" value="{{ old('email') }}">

            @if($errors->has("email"))
                <div class="invalid-feedback">
                    {{$errors->first("email")}}
                </div>
            @endif

        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="" class="form-control @if($errors->has('password')) is-invalid @endif"" >

            @if($errors->has("password"))
                <div class="invalid-feedback">
                    {{$errors->first("password")}}
                </div>
            @endif

        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="" class="form-control">
        </div>


        <input type="submit" value="Register" class="btn btn-success">
    </form>
@stop
