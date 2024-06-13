@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="card shadow border-0">
        <div class="card-header">
            <h5>Tambah User</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="role_id" class="form-label">Role:</label>
                            <select id="role_id" name="role_id" class="form-control" required>
                                @foreach ($roles as $role)
                                    <option  value="{{ $role->id }}">{{ $role->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
