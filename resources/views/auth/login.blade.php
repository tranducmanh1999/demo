@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto align-item-center py-5">
                <h3 class="login-heading mb-4">Login!</h3>
                <form method="POST" {{ route('login') }}>
                    @csrf
                    <div class="form-label-group">
                        <label for="inputEmail">Email address</label>
                        <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Email address" required
                            autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-label-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" id="inputPassword"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                            name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                        <label class="custom-control-label" for="customCheck1">Remember password</label>
                    </div>
  
                    <div class="text-center">
                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                        type="submit">Sign in</button>
                        <a class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" href="{{route('register')}}"
                        type="submit">Register</a>
                        @if (Route::has('password.request'))
                            <a class="small" href="{{ route('password.request') }}">Forgot password?</a>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
