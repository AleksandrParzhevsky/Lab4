<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //метод, который начинает работать, когда мы вызываем миграцию
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id') -> unsigned();
            $table->string('worker_name');
            $table->string('worker_surname');
            $table->string('worker_patronymic');
            $table->integer('worker_num_l');
            $table->integer('worker_num_s');
            $table->integer('id_les') -> references('id_les') -> on('lesson')-> unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //метод, используемый для отката
    {
        Schema::dropIfExists('workers');
    }
}

