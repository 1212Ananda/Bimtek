@extends('layouts.dashboard')
@section('content')
<div class="container">
    <button type="button" class="btn btn-primary">Tambah</button>
    <table class="table">
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
        <td><button type="button" class="btn btn-warning">Edit</button></td>
        <td><button type="button" class="btn btn-danger">Delete</button></td>
      </tr>     
    </tbody>
  </table>
@endsection