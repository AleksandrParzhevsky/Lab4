@extends('layouts.app')
@section('title-block')Список предметов@endsection
@section('content')
  <h1>Список предметов:</h1>
     @foreach($dataLesson as $el)
     <div class = "alert alert-info">
         <h3>{{ $el->lesson }}</h3>
         <p>День проведения: {{ $dataDays[($el -> id_day) - 1]['day']}}</p>
         <p>Кабинет: {{ $el->classRoom }}</p>
         <p><small>{{ $el->created_at }}</small></p>
        <a href="{{ route('lesson-data-one', $el -> id ) }}" <button class="btn btn-warning">Редактировать</button></a>
    </div>
  @endforeach
@endsection
