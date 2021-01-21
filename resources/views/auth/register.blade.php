@extends('layouts.landing')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
            <div class="card-img-left d-none d-md-flex">
                <!-- Background image for card set in CSS! -->
            </div>
            <div class="card-body">
            <h5 class="card-title text-center">Register</h5>
            <form class="form-signin" method="POST" action="{{ route('register') }}">
            @csrf
                <div class="form-label-group">
                    <input type="text" id="name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <label for="name">Username</label>
                </div>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-label-group">
                    <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus required>
                    <label for="inputEmail">Email address</label>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <hr>

                <div class="form-label-group">
                    <input type="password" id="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <label for="password">Password</label>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <div class="form-label-group">
                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <label for="password-confirm">Confirm password</label>
                </div>

                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                <a class="d-block text-center mt-2 small" href="{{route('login')}}">Sign In</a>            
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
