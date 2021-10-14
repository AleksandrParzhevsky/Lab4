@extends('layouts.app')
@section('title-block')Добавление преподавателя в базу@endsection
@section('content')

  <h1>Добавить нового преподавателя в базу данных</h1>
  @include('inc.messages')
  <form action = "{{ route('worker-form') }}" method = "post">
    @csrf
      <div class = "form group">
          <label for = "worker_name">Введите имя:</label>
          <input type = "text" name="worker_name" id ="worker_name" class="form-control">
      </div>

      <div class = "worker_surname">
          <label for = "position">Введите фамилию:</label>
          <input type = "text" name="worker_surname" id ="worker_surname" class="form-control">
      </div>

      <div class = "form-group">
          <label for = "worker_patronymic">Введите отчество:</label>
          <input type = "text" name="worker_patronymic" id ="worker_patronymic" class="form-control">
      </div>

      <div class = "form-group">
          <label for = "worker_num_l">Введите количество пар в неделю:</label>
          <input type = "text" name="worker_num_l" id ="worker_num_l" class="form-control">
      </div>

      <div class = "form-group">
          <label for = "worker_num_s">Введите кол-во студентов, занимающихся на каждой паре:</label>
          <input type = "text" name="worker_num_s" id ="worker_num_s" class="form-control">
      </div>

      <div class = "form-group">
          <label for = "id_les">Выберите предмет:</label>
          <p><select name="id_les" class ="form-control">
                  <option disabled = "disabled">Выбор предмета:</option>
                  <?php
                  $db_host='127.0.0.1';
                  $db_name='kpo4';
                  $db_user='root';
                  $db_pass='';
                  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                  $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
                  $mysqli->set_charset("utf8mb4");

                  $result = $mysqli->query('SELECT * FROM `lessons`');
                  while($row = $result->fetch_assoc())
                  {
                      unset($id, $name);
                      $id = $row['id'];
                      $lesson = $row['lesson'];
                      echo '<option value = "'.$id.'">'.$lesson.'</option>';
                  }
                  ?>
              </select></p>
      </div>



    <button type = "submit">Записать</button>

  </form>
@endsection
