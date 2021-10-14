@extends('layouts.app')
@section('title-block')Вывести информацию о преподавателях@endsection
@section('content')
  <h1>Вывести информацию о преподавателях, которые не ведут занятия в за
      данный день недели.</h1>
  @include('inc.messages')

  <form action = "{{ route('workers-task2') }}" method = "get">
    @csrf

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
                  $mysqli->set_charset("utf8mb4"); // задаем кодировку

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

    <button type = "submit_task2">Вывести</button>
  </form>
@endsection
