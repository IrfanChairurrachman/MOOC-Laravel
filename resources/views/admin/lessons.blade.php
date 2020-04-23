@extends('layouts.main')

@section('title', 'MOOC')

@section('container')
  @foreach($courses as $course)
    <a href="/admin" class="btn btn-dark mt-3"><-Kembali</a>
    <a href="/admin/{{ $course->id }}/edit" class="btn btn-success mt-3">Edit Course</a>
    <form action="/admin/{{ $course->id }}" method="post" class="d-inline">
      @method('delete')
      @csrf
      <button type="submit" class="btn btn-danger mt-3">Delete Course</button>
    </form>
    <h1 class="mt-3">Helo, this is {{$course->name}}</h1>
    <a href="create" class="btn btn-primary">Tambah Lesson</a>
  @endforeach
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  @foreach($lessons as $lesson)
    <div class="list-group my-3">
        <a href="{{$lesson->id}}" class="list-group-item list-group-item-action">
            {{$lesson->name}}
        </a>
        <ul class="list-group list-group-horizontal-lg">
          <form action="/admin/{{ $course->id }}/{{ $lesson->id }}/edit" method="get" class="d-inline">
            <button type="submit" class="btn btn-info">Edit Lesson</button>
          </form>
          <form action="/admin/{{ $course->id }}/{{ $lesson->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Delete Lesson</button>
          </form>
        </ul>
        
    </div>
  @endforeach
  
@endsection