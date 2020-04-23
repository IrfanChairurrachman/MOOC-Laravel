@extends('layouts.main')

@section('title', 'Create Course')

@section('container')
<h1 class="mt-3">Tambah data</h1>
<a href="/admin" class="btn btn-dark mb-3"><-Kembali</a>
<form method="POST" action="/admin/{{$course->id}}">
  @csrf
  <div class="form-group">
    <label for="name">Lesson Name: </label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
    @error('name')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="name">Link Video: </label>
    <input type="url" class="form-control @error('linkvid') is-invalid @enderror" name="linkvid" value="{{ old('linkvid') }}">
    @error('name')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="disabledSelect">DCourse</label> 
    <select id="disabledSelect" class="form-control" name="course">
      <option value='{{$course->id}}'>{{$course->name}}</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Create Lesson</button>
</form>
@endsection