@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card shadow border-0">
          <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">List User</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-2">Tambah </a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th>Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($users as $item)
                   <tr>
                    <th >{{$loop->iteration}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->role->nama}}</td>
                    <td>
                      <div class="d-flex gap-2">
                        <a href="{{route('users.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                      <form action="{{ route('users.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                      </div>
                    </td>
                    
                </tr>
                   @endforeach
                </tbody>
            </table>
            </div>
          </div>
        </div>
       
    @endsection
