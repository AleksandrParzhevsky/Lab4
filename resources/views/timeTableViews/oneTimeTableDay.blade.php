@extends('layouts.app')
@section('title-block'){{ $dataTimeTable->timetable_day }}@endsection
@section('content')
  <h1>{{ $dataTimeTable->timetable_day }}</h1>
  <div class = "alert alert-info">
      <p>Занятие №1: {{ $dataLesson[($dataTimeTable -> id_first_lesson) - 1]['lesson'] }}</p>
      <p>Занятие №2: {{ $dataLesson[($dataTimeTable -> id_second_lesson) - 1]['lesson'] }}</p>
      <p>Занятие №3: {{ $dataLesson[($dataTimeTable -> id_third_lesson) - 1]['lesson'] }}</p>
      <p><small>{{ $dataTimeTable->created_at }}</small></p>
     <a href="{{ route('timeTableDay-update', $dataTimeTable -> id ) }}" <button class="btn btn-warning">Редактировать</button></a>
     <a href="{{ route('timeTableDay-delete', $dataTimeTable -> id ) }}" <button class="btn btn-danger">Удалить</button></a>
 </div>
@endsection
