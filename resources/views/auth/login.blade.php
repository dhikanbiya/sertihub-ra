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
            <h5 class="card-title text-center">Login</h5>
            <form class="form-signin" method="POST" action="{{ route('login') }}">
               @csrf

                <div class="form-label-group">
                    <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus required>
                    <label for="inputEmail">Email address</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <hr>

                <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" required>
                    <label for="inputPassword">Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
              

                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                @if (Route::has('password.request'))
                    <a class="d-block text-center mt-2 small" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                <a class="d-block text-center mt-2 small" href="{{route('register')}}">Register</a>            
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
