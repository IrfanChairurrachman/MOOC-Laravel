@extends('layouts.main')

@section('title', 'MOOC')

@section('container')
  <a href="/{{$course->id}}/" class="btn btn-dark my-3"><-Kembali</a>
  @foreach($material as $mtr)
    <h1>{{$mtr->name}}</h1>
    <h4>Berikut adalah video mengenai {{$mtr->name}}</h4>
    <!-- https://www.youtube.com/embed/id -->
    <div class="mx-auto my-3" style="width: 1000px;">
      <iframe width="1000" height="500" src="{{$mtr->linkvid}}">
      </iframe>
    </div>
  @endforeach
@endsection