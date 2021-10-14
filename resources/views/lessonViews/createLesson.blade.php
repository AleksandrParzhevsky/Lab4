@extends('layouts.app')
@section('title-block')Добавление предмета в базу@endsection
@section('content')
  <h1>Добавить новый предмет в базу данных</h1>
  @include('inc.messages')
  <form action = "{{ route('lesson-form') }}" method = "post">
    @csrf
    <div class = "form-group">
      <label for = "lesson">Введите наименование предмета:</label>
      <input type = "text" name="lesson" id ="lesson" class="form-control">
    </div>

    <div class = "form-group">
      <label for = "classRoom">Введите кабинет:</label>
      <input type = "text" name="classRoom" id ="classRoom" class="form-control">
    </div>

      <div class = "form-group">
          <label for = "id_day">Выберите день недели:</label>
          <p><select name="id_day" class ="form-control">
                  <option disabled = "disabled">Выбор дня:</option>
                  <?php
                  $db_host='127.0.0.1';
                  $db_name='kpo4';
                  $db_user='root';
                  $db_pass='';
                  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                  $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
                  $mysqli->set_charset("utf8mb4");

                  $result = $mysqli->query('SELECT * FROM `days`');
                  while($row = $result->fetch_assoc())
                  {
                      unset($id, $name);
                      $id = $row['id_day'];
                      $day = $row['day'];
                      echo '<option value = "'.$id.'">'.$day.'</option>';
                  }
                  ?>
              </select></p>
      </div>

    <button type = "submit">Записать</button>

  </form>
@endsection
