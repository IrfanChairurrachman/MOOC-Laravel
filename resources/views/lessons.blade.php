@extends('layouts.main')

@section('title', 'MOOC')

@section('container')
  <a href="/" class="btn btn-dark mt-3"><-Kembali</a>
  @foreach($courses as $course)
    <h1 class="mt-3">Helo, this is {{$course->name}}</h1>
  @endforeach
  @foreach($lessons as $lesson)
    <div class="list-group mt-3">
        <a href="{{$lesson->id}}" class="list-group-item list-group-item-action">
            {{$lesson->name}}
        </a>
    </div>
  @endforeach
  
@endsection