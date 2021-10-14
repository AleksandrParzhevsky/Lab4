@section('aside')
<div class = "aside">
  <h4>Панель для работы с базой данных</h4>
    <p><a class="p-6 text-dark" href="{{ route('workers-data') }}">Список преподавателей</a></p>
    <p><a class="p-6 text-dark" href="{{ route('createWorker') }}">Записать нового преподавателя</a></p><br>
    <p><a class="p-6 text-dark" href="{{ route('lesson-data') }}">Список предметов</a></p>
    <p><a class="p-6 text-dark" href="{{ route('createLesson') }}">Записать новый предмет</a></p><br>
    <p><a class="p-6 text-dark" href="{{ route('timeTable-data') }}">Расписание</a></p>
    <p><a class="p-6 text-dark" href="{{ route('createTimeTableDay') }}">Изменить расписание</a></p><br>
    <p><a class="p-6 text-dark" href="{{ route('task1') }}">Задание №1</a></p>
    <p><a class="p-6 text-dark" href="{{ route('task2') }}">Задание №2</a></p>
    <p><a class="p-6 text-dark" href="{{ route('task3') }}">Задание №3</a></p><br>
  @show
</div>
