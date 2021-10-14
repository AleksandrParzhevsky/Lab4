<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\InputRequestLesson;
use App\Models\Lesson;
use App\Models\Days;

class LessonController extends Controller{
    public function submit(InputRequestLesson $req){ // Функция для записи нового предмета

      $lesson = new Lesson();
        // Записываем данные полученные из формы
      $lesson->lesson = $req->input('lesson');
      $lesson->classRoom = $req->input('classRoom');
      $lesson->id_day = $req->input('id_day');

      $lesson->save();// Записываем данные полученные из формы


        return redirect() -> route('createLesson') -> with('success','Данные были успешно записаны');
    }

    public function allData(){// Функция для вывода списка всех предметов
      $lesson = new Lesson;
      $days = new Days;
      return view ('lessonTable', ['dataLesson' => Lesson::all()], ['dataDays' => Days::all()]);
    }

    public function showOneMessage($id){ // Функция для вывода предмета по id
      $lesson = new Lesson;
      $days = new Days;
      return view ('oneLesson', ['dataLesson' => $lesson->find($id)], ['dataDays' => Days::all()]);
    }

    public function updateMessage($id){ // Функция для вывода редактирования данных предмета
      $lesson = new Lesson;
      return view ('updateLesson', ['data' => $lesson->find($id)]);
    }

    public function updateMessageSubmit($id, InputRequestLesson $req){ // Функция для обновления данных предмета

        $lesson = Lesson::find($id);
        $lesson->lesson = $req->input('lesson');
        $lesson->classRoom = $req->input('classRoom');
        $lesson->id_day = $req->input('id_day');

      $lesson->save();

      return redirect() -> route('lesson-data-one', $id) -> with('success','Данные были успешно записаны');
    }

    public function deleteMessage($id){ // Функция для удаления предмета из бд
      Lesson::find($id)->delete();
      return redirect() -> route('lesson-data') -> with('success','Данные были удалены');
    }
}
