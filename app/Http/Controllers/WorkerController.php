<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\InputRequest;
use App\Models\Worker;
use App\Models\Lesson;

class WorkerController extends Controller{
    public function submit(InputRequest $req){ // Функция для записи нового преподавателя

      $worker = new Worker();

      // Записываем данные полученные из формы
      $worker->worker_name = $req->input('worker_name');
      $worker->worker_surname = $req->input('worker_surname');
      $worker->worker_patronymic = $req->input('worker_patronymic');
      $worker->worker_num_l = $req->input('worker_num_l');
      $worker->worker_num_s = $req->input('worker_num_s');
      $worker->id_les = $req->input('id_les');

      $worker->save();// Выполняем запись новых данных в бд

      return redirect() -> route('createWorker') -> with('success','Данные были успешно записаны');
    }

    public function allData(){ // Функция для вывода списка всех преподавателей
      $worker = new Worker;
      $lesson = new Lesson;
      return view ('workerTable', ['dataWorker' => $worker->all()],['dataLesson' => $lesson->all()]);
    }

    public function showOneMessage($id){ // Функция для вывода преподавателя по id
      $worker = new Worker;
      $lesson = new Lesson;
      return view ('oneWorker', ['dataWorker' => $worker->find($id)],['dataLesson' => $lesson->all()]);
    }

    public function updateMessage($id){ // Функция для вывода редактирования данных преподавателя
      $worker = new Worker;
      return view ('updateWorker', ['data' => $worker->find($id)]);
    }

    public function updateMessageSubmit($id, InputRequest $req){ // Функция для обновления данных преподавателя

      $worker = Worker::find($id); // Находим преподавателя по id
      $worker->worker_name = $req->input('worker_name');
      $worker->worker_surname = $req->input('worker_surname');
      $worker->worker_patronymic = $req->input('worker_patronymic');
      $worker->worker_num_l = $req->input('worker_num_l');
      $worker->worker_num_s = $req->input('worker_num_s');
      $worker->id_les = $req->input('id_les');

      $worker->save();

      return redirect() -> route('workers-data-one', $id) -> with('success','Данные были успешно записаны');
    }

    public function deleteMessage($id){ // Функция для удаления преподавателя из бд
      Worker::find($id)->delete();
      return redirect() -> route('workers-data') -> with('success','Данные были удалены');
    }
}
