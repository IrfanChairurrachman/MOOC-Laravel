@extends('layouts.main')

@section('title', 'Admin')

@section('container')
<h1 class="mt-3">Admin</h1>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<a href="/admin/create" class="btn btn-primary">Tambah</a>
<div class="row row-cols-1 row-cols-md-3 mt-3">
  @foreach($courses as $course)
  <div class="col mb-4">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">{{$course->name}}</h5>
        <p class="card-text">{{$course->deskripsi}}</p>
      </div>
        <a href="/admin/{{$course->id}}/" class="btn btn-primary">Pelajari Kelas</a>
    </div>
  </div>
  @endforeach
</div>
@endsection