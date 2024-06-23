@extends('layouts.landingpage')

@section('content')
<div class="container">
    <div class="row d-flex my-5 align-items-center justify-content-center" style="border: 2px solid #ffffff; height:100vh;">
        <div class="col-md-5">
            <img src="../img/register.jpg" style="width: 100%; height: auto;" alt="Register Image">
        </div>
        <div class="col-md-5 offset-md-1">
            <div class="card text-center my-3 p-3">
                <div class="card-body mt-auto">
                    <h1 class="mb-3">Register</h1>
                    <h4 class="mb-3">Join us today!</h4>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                    <form class="mt-5" action="{{ route('register') }}" method="POST"> 
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" placeholder="Name" name="name" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                        </div>

                        <!-- New fields -->
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" placeholder="No Telepon" name="no_tlp" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" placeholder="Nama Perusahaan" name="nama_perusahaan" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" placeholder="Alamat Perusahaan" name="alamat_perusahaan" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" placeholder="No Perusahaan" name="no_perusahaan" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                    <div class="mt-3">
                        <span>Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
