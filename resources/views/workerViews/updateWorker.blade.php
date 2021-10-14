@extends('layouts.app')
@section('title-block')Редактирование записи@endsection
@section('content')
  <h1>Редактирование записи</h1>
  @include('inc.messages')
  <form action = "{{ route('workers-update-submit', $data->id) }}" method = "post">
    @csrf

      <div class = "form group">
          <label for = "name">Введите имя:</label>
          <input type = "text" name="worker_name" value="{{$data->worker_name}}" id ="worker_name" class="form-control">
      </div>

      <div class = "form-group">
          <label for = "position">Введите фамилию:</label>
          <input type = "text" name="worker_surname" value="{{$data->worker_surname}}" id ="worker_surname" class="form-control">
      </div>

      <div class = "form-group">
          <label for = "position">Введите отчество:</label>
          <input type = "text" name="worker_patronymic" value="{{$data->worker_patronymic}}" id ="worker_patronymic" class="form-control">
      </div>

      <div class = "form-group">
          <label for = "service">Введите количество пар в неделю:</label>
          <input type = "text" name="worker_num_l" value="{{$data->worker_num_l}}" id ="worker_num_l" class="form-control">
      </div>

      <div class = "form-group">
          <label for = "num_of_stds">Введите кол-во студентов, занимающихся на каждой паре:</label>
          <input type = "text" name="worker_num_s" value="{{$data->worker_num_s}}" id ="worker_num_s" class="form-control">
      </div>

      <div class = "form-group">
          <label for = "id_les">Выберите предмет:</label>
          <p><select name="id_les" class ="form-control">
                  <option disabled = "disabled">Выбор предмета:</option>
                  <?php
                  $db_host='127.0.0.1'; // ваш хост
                  $db_name='kpo4'; // ваша бд
                  $db_user='root'; // пользователь бд
                  $db_pass=''; // пароль к бд
                  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
                  $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); // коннект с сервером бд
                  $mysqli->set_charset("utf8mb4"); // задаем кодировку

                  $result = $mysqli->query('SELECT * FROM `lessons`'); // запрос на выборку
                  while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
                  {
                      unset($id, $name);
                      $id = $row['id'];
                      $lesson = $row['lesson'];
                      echo '<option value = "'.$id.'">'.$lesson.'</option>';// выводим данные
                  }
                  ?>
              </select></p>
      </div>

    <button type = "submit" class = "btn btn-warning">Обновить данные</button>

  </form>
@endsection
