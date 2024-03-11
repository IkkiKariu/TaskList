<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get(); // Получаем записи сущности

        return view('tasks', ['tasks' => $tasks]); // Передаём их в контекст шаблона
    }

    public function store(Request $request)
    {
        $task = new Task; // Инстанциурем модель
        $task->name = $request->name; // Извлекаем значение из тела запроса --> задаём это значение свойству записи
        $task->save(); //сохраняем запись

        // ну и на страницу задач перенаправить надо кншн
        return redirect('/');
    }

    public function delete($task_id)
    {
        Task::destroy($task_id);

        return redirect('/');
    }
}
