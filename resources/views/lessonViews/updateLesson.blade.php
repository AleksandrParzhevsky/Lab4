@extends('layouts.app')
@section('title-block')Редактирование записи@endsection
@section('content')
  <h1>Редактирование записи</h1>
  @include('inc.messages')
  <form action = "{{ route('lesson-update-submit', $data->id) }}" method = "post">
    @csrf
    <div class = "form-group">
      <label for = "lesson">Введите наименование предмета:</label>
      <input type = "text" name="lesson" value="{{$data->lesson}}" id ="lesson" class="form-control">
    </div>

    <div class = "form-group">
      <label for = "classRoom">Введите кабинет:</label>
      <input type = "text" name="classRoom" value="{{$data->classRoom}}" id ="classRoom" class="form-control">
    </div>

      <div class = "form-group">
          <label for = "id_day">Выберите день недели:</label>
          <p><select name="id_day" class ="form-control">
                  <option disabled = "disabled">Выбор дня:</option>
                  <?php
                  $db_host='127.0.0.1'; // ваш хост
                  $db_name='kpo4'; // ваша бд
                  $db_user='root'; // пользователь бд
                  $db_pass=''; // пароль к бд
                  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
                  $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); // коннект с сервером бд
                  $mysqli->set_charset("utf8mb4"); // задаем кодировку

                  $result = $mysqli->query('SELECT * FROM `days`'); // запрос на выборку
                  while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
                  {
                      unset($id, $name);
                      $id = $row['id_day'];
                      $day = $row['day'];
                      echo '<option value = "'.$id.'">'.$day.'</option>';// выводим данные
                  }
                  ?>
              </select></p>
      </div>

    <button type = "submit" class = "btn btn-warning">Обновить данные</button>

  </form>
@endsection
