@extends('layouts.main')

@section('title', 'Create Course')

@section('container')
<h1 class="mt-3">Tambah data</h1>
<a href="/admin" class="btn btn-dark mb-3"><-Kembali</a>
<form method="POST" action="/admin">
  @csrf
  <div class="form-group">
    <label for="name">Courses Name: </label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
    @error('name')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="deskripsi">Course Description</label>
    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"></textarea>
    @error('deskripsi')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Create Course</button>
</form>
@endsection