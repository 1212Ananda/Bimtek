@extends('layouts.landingpage')

@section('content')

<div class="container">
    <div class="row  d-flex my-5 align-items-center  justify-content-center " style="border: 2px solid #ffffff; height:100vh;">
        <div class="col-md-6">
            <div class="">
                <img src="../img/login.jpg" style="width: 500px; height: auto;" alt="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center my-3 p-3">
                <div class="card-body mt-auto">
                    <h1 class="mb-3">Halo Sobat Industri!</h1>
                    <h4 class="mb-3">Login dulu yuk...</h4>
                

                    <!-- Display validation errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form class="mt-5" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="form-group mb-3 text-right">
                            <a href="{{ route('password.request') }}" class="text-primary">Forgot your password?</a>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <div class="mt-3">
                        <span>No account yet? <a href="{{ route('register') }}" class="text-primary">Register</a>.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
