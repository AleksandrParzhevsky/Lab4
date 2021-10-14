@extends('layouts.app')
@section('title-block')Добавление дня недели@endsection
@section('content')
  <h1>Добавить новое расписание для дня недели в базу данных</h1>
  @include('inc.messages')
  <form action = "{{ route('timeTableDay-form') }}" method = "post">
    @csrf
      <div class = "form-group">
          <label for = "day">Выберите день недели:</label>
          <p><select name="day" class ="form-control">
                  <option disabled = "disabled">Выбор дня:</option>
                  <option value = "Понедельник" selected>Понедельник</option>
                  <option value = "Вторник">Вторник</option>
                  <option value = "Среда">Среда</option>
                  <option value = "Четверг">Четверг</option>
                  <option value = "Пятница">Пятница</option>
              </select></p>
      </div>

      <div class = "form-group">
          <label for = "id_first_lesson">Выберите первое занятие:</label>
          <p><select name="id_first_lesson" class ="form-control">
                  <option disabled = "disabled">Выбор занятия:</option>
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

      <div class = "form-group">
          <label for = "id_second_lesson">Выберите второе занятие:</label>
          <p><select name="id_second_lesson" class ="form-control">
                  <option disabled = "disabled">Выбор занятия:</option>
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

      <div class = "form-group">
          <label for = "id_third_lesson">Выберите третье занятие:</label>
          <p><select name="id_third_lesson" class ="form-control">
                  <option disabled = "disabled">Выбор занятия:</option>
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
