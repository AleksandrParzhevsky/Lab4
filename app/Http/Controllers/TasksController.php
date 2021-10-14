<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\InputRequestLesson;
use App\Models\Lesson;
use App\Models\TimeTable;
use App\Models\Days;
use App\Models\Worker;

class TasksController extends Controller{

    public function resultTask1(Request $req){ //Функция для задания №1

        $lesson = new Lesson;

        // Выполняем поиск предмета по данным, которые были заданы в форме
        $lessons = Lesson::where('id_day', $req->input('id_day'))
                       -> where('classRoom', $req->input('classRoom'))
                       -> get();

        $workers = collect();// Создаём коллекцию для преподавателей
        foreach ($lessons as $lesson) {
            // Заполняем коллекцию преподавателями, которые введут ранее найденные предметы
            $workers ->push(Worker::where('id_les', $lesson -> id)
                -> get());
        }

        return view ('task1Table', ['dataWorker' => $workers], ['dataLesson' => $lesson->all()]);
    }

    public function resultTask2(Request $req){ //Функция для задания №2

        // Выполняем поиск предмета по данным, которые были заданы в форме
        $lessons = Lesson::whereNotBetween('id_day', [$req->input('id_day'), $req->input('id_day')])
            -> get(); // Используем метод whereNotBetween() который проверяет, что значения столбца находится вне указанного интервала

        $workers = collect();// Создаём коллекцию для преподавателей
        foreach ($lessons as $lesson) {
            // Заполняем коллекцию преподавателями, которые введут ранее найденные предметы
            $workers ->push(Worker::where('id_les', $lesson -> id)
                -> get());
        }

        return view ('task2Table', ['dataWorker' => $workers], ['dataLesson' => $lesson->all()]);
    }

    public function resultTask3(Request $req){ //Функция для задания №3

        // Выполняем поиск расписание по данным, которые были заданы в форме
        $timeTable = TimeTable::find($req->input('id_day'));

        // Выполняем замену первого предмета на последний
        $lessonTemp = "";
        $lessonTemp = $timeTable -> id_first_lesson;
        $timeTable -> id_first_lesson = $timeTable -> id_third_lesson;
        $timeTable -> id_third_lesson = $lessonTemp;

        $timeTable->save();// Выполняем запись новых данных в бд

        return redirect() -> route('timeTableDay-data-one', $req->input('id_day'));
    }

}
