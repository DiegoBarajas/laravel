<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>TareApp | Todo</title>
        @vite(['resources/css/app.css'])

    </head>
    <body>
        @if (session('success'))
            <h3 class="notification">{{session('success')}}</h3>
        @endif
        
        <div class="container">
            <h1>Tareas</h1>
            <a class="anchor-add-task" href="/task/create">Agregar Tarea</a>
            
            @foreach ($tasks as $task)

                <div class="element">

                    <a href="/task/{{$task->id}}">
                        <h4>{{$task->title}}</h4>
                        <hr>
                        <p>{{$task->description}}</p>
                        <p>{{$task->created_at}}</p>
                        <div class="tags-container">

                            @foreach ($task->categories as $category)
                                <p class="tag" style="background-color: {{$category->color}}">{{$category->name}}</p>
                            @endforeach

                        </div>
                        <div>
                            <label>Hecho: </label>
                            <input disabled type="checkbox" @if($task->done) checked @endif>
                        </div>
                    </a>
                    
                </div>

            @endforeach
        </div>

    </body>
</html>