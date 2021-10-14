@extends('layouts.app')
@section('title-block')Список преподавателей@endsection
@section('content')
  <h1>Список преподавателей:</h1>
  @foreach($dataWorker as $el_w)
     <div class = "alert alert-info">
         <h3>{{ $el_w->worker_surname }}</h3>
         <h3>{{ $el_w->worker_name }}</h3>
         <h3>{{ $el_w->worker_patronymic }}</h3>
         <p>Предмет: {{ $dataLesson[($el_w -> id_les) - 1]['lesson']}}</p>
         <p>Количество пар в неделю: {{ $el_w->worker_num_l }}</p>
         <p>Кол-во студентов, занимающихся на каждой паре: {{ $el_w->worker_num_s }}</p>
         <p><small>{{ $el_w->created_at }}</small></p>
         <a href="{{ route('workers-data-one', $el_w -> id ) }}" <button class="btn btn-warning">Редактировать</button></a>
    </div>
  @endforeach
@endsection
