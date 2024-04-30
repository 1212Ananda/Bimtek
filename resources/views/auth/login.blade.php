@extends('layouts.landingpage')

@section('content')
{{-- <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container">
    <div class="row  d-flex my-5 align-items-center  justify-content-center " style="border: 2px solid #b31515; heigh:100vh;">
    <div class="col-md-6">
        <div class="  ">
            <img src="../img/login.jpg"  style="width: 500px; height: auto;" alt="">
        </div>
        
    </div>
    <div class="col-md-6">
        <div class="  card text-center my-3 p-3 ">
            <div class="card-body mt-auto">
                <h1 class="mb-3">Halo Sobat Industri!</h1>
                <h4 class="mb-3">Login dulu yuk...</h4>
            
                <form class="mt-5"> 
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group mb-3 text-right">
                        <a href="#" class="text-primary">Forgot your password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <div class="mt-3">
                    <span>No account yet? <a href="#" class="text-primary">Register</a>.</span>
                </div>
        </div>
        
    </div>
    </div>

</div>

@endsection
