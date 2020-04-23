@extends('layouts.main')

@section('title', 'Edit Course')

@section('container')
<h1 class="mt-3">Edit Data Course</h1>
<a href="/admin/{{$course->id}}" class="btn btn-dark mb-3"><-Kembali</a>
<form method="post" action="/admin/{{$course->id}}">
  @method('patch')
  @csrf
  <div class="form-group">
    <label for="name">Courses Name: </label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $course->name }}">
    @error('name')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="deskripsi">Course Description</label>
    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ $course->deskripsi }}</textarea>
    @error('deskripsi')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Edit Course</button>
</form>
@endsection