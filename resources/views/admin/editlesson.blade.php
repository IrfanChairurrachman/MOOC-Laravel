@extends('layouts.main')

@section('title', 'Edit Course')

@section('container')
<h1 class="mt-3">Edit Data Course</h1>
<a href="/admin/{{$course->id}}" class="btn btn-dark mb-3"><-Kembali</a>
<form method="post" action="/admin/{{ $course->id }}/{{ $lesson->id }}">
  @method('patch')
  @csrf
  <div class="form-group">
    <label for="name">Lesson Name: </label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $lesson->name }}">
    @error('name')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="name">Link Video: </label>
    <input type="url" class="form-control @error('linkvid') is-invalid @enderror" name="linkvid" value="{{ $lesson->linkvid }}">
    @error('name')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label>Course</label> 
    <select class="form-control" name="course">
      <option value='{{$course->id}}'>{{$course->name}}</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Edit Course</button>
</form>
@endsection