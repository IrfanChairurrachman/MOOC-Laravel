@extends('layouts.main')

@section('title', 'MOOC')

@section('container')
<div class="mx-auto" style="width: 400px;">
  <h1 class="mt-3">Daftar Kelas</h1>
</div>
<div class="row row-cols-1 row-cols-md-3 mt-3">
  @foreach($courses as $course)
  <div class="col mb-4">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">{{$course->name}}</h5>
        <p class="card-text">{{$course->deskripsi}}</p>
      </div>
        <a href="{{$course->id}}/" class="btn btn-primary">Pelajari Kelas</a>
    </div>
  </div>
  @endforeach
</div>
@endsection