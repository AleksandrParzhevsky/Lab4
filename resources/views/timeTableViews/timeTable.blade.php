@extends('layouts.app')
@section('title-block')Расписание@endsection
@section('content')
  <h1>Расписание занятий:</h1>
     @foreach($dataTimeTable as $el)
     <div class = "alert alert-info">
        <h3>{{ $el -> timetable_day }}</h3>
         <p>Занятие №1: {{ $dataLesson[($el -> id_first_lesson) - 1]['lesson'] }}</p>
         <p>Занятие №2: {{ $dataLesson[($el -> id_second_lesson) - 1]['lesson'] }}</p>
         <p>Занятие №3: {{ $dataLesson[($el -> id_third_lesson) - 1]['lesson'] }}</p>
        <p><small>{{ $el->created_at }}</small></p>
        <a href="{{ route('timeTableDay-data-one', $el -> id) }}" <button class="btn btn-warning">Редактировать</button></a>
    </div>
  @endforeach
@endsection
