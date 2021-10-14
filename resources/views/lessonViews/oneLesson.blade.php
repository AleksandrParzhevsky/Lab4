@extends('layouts.app')
@section('title-block'){{ $dataLesson->lesson }}@endsection
@section('content')
  <h1>{{ $dataLesson->lesson }}</h1>
  <div class = "alert alert-info">
      <p>Аудитория: {{ $dataLesson->classRoom }}</p>
      <p>День проведения: {{ $dataDays[($dataLesson -> id_day) - 1]['day']}}</p>
     <p><small>{{ $dataLesson->created_at }}</small></p>
     <a href="{{ route('lesson-update', $dataLesson -> id ) }}" <button class="btn btn-warning">Редактировать</button></a>
     <a href="{{ route('lesson-delete', $dataLesson -> id ) }}" <button class="btn btn-danger">Удалить</button></a>
 </div>
@endsection
