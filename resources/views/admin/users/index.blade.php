@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card shadow border-0">
          <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">List User</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              
        <button type="button" class="btn btn-primary mb-2">Tambah</button>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Ananda</td>
                        <td>Ananda@gmail.com</td>
                        <td>
                          <button type="button" class="btn btn-warning">Edit</button>
                          <button type="button" class="btn btn-danger">Delete</button>
                        
                        </td>
                        
                    </tr>
                </tbody>
            </table>
            </div>
          </div>
        </div>
       
    @endsection
