<?php

namespace App\Http\Controllers;

use App\Models\TimeTable;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TimeTableController extends Controller{
    public function submit(Request $req){// Функция для записи нового расписания

      $timeTable = new TimeTable();
        // Записываем данные полученные из формы
      $timeTable->timetable_day = $req->input('day');
      $timeTable->id_first_lesson = $req->input('id_first_lesson');
      $timeTable->id_second_lesson = $req->input('id_second_lesson');
      $timeTable->id_third_lesson = $req->input('id_third_lesson');

      $timeTable->save();// Выполняем запись новых данных в бд

      return redirect() -> route('createTimeTableDay') -> with('success','Данные были успешно записаны');
    }

    public function allData(){// Функция для вывода всего расписания
        $timeTable = new TimeTable;
        $lesson = new Lesson;
      return view ('timeTable', ['dataTimeTable' => TimeTable::all()], ['dataLesson' => Lesson::all()]);
    }

    public function showOneMessage($id){// Функция для вывода расписания по id
        $timeTable = new TimeTable;
        $lesson = new Lesson;
      return view ('oneTimeTableDay', ['dataTimeTable' => $timeTable->find($id)], ['dataLesson' => Lesson::all()]);
    }

    public function updateMessage($id){// Функция для вывода редактирования данных расписания
      $timeTable = new TimeTable;
      return view ('updateTimeTableDay', ['data' => $timeTable->find($id)]);
    }

    public function updateMessageSubmit($id, Request $req){// Функция для обновления данных расписания

        $timeTable = TimeTable::find($id);// Находим расписание по id
        $timeTable->timetable_day = $req->input('day');
        $timeTable->id_first_lesson = $req->input('id_first_lesson');
        $timeTable->id_second_lesson = $req->input('id_second_lesson');
        $timeTable->id_third_lesson = $req->input('id_third_lesson');

        $timeTable->save();

      return redirect() -> route('timeTableDay-data-one', $id) -> with('success','Данные были успешно записаны');
    }

    public function deleteMessage($id){ // Функция для удаления расписания из бд
      TimeTable::find($id)->delete();
      return redirect() -> route('timeTableDay-data') -> with('success','Данные были удалены');
    }
}
