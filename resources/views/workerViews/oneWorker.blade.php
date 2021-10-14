@extends('layouts.app')
@section('title-block'){{ $dataWorker->worker_name }}@endsection
@section('content')
    <h1>{{ $dataWorker->worker_surname }}</h1>
    <h1>{{ $dataWorker->worker_name }}</h1>
    <h1>{{ $dataWorker->worker_patronymic }}</h1>
  <div class = "alert alert-info">
      <p>Предмет: {{$dataLesson[($dataWorker->id_les) - 1]['lesson']}}</p>
      <p>Количество пар в неделю: {{ $dataWorker->worker_num_l }}</p>
      <p>Количество студентов, занимающихся на каждой паре: {{ $dataWorker->worker_num_s }}</p>
     <p><small>{{ $dataWorker->created_at }}</small></p>
     <a href="{{ route('workers-update', $dataWorker -> id ) }}" <button class="btn btn-warning">Редактировать</button></a>
     <a href="{{ route('workers-delete', $dataWorker -> id ) }}" <button class="btn btn-danger">Удалить</button></a>
 </div>
@endsection
