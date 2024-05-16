<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tarea #{{$task->id}}</title>
        @vite(['resources/css/app.css'])
    </head>
    <body>
        <a href="/task" class="anchor-back">Volver Atras</a>

        @if (session('success'))
            <h3 class="notification">{{session('success')}}</h3>
        @endif
        <div class="container">

            <form action="/task/{{$task->id}}" method="POST">
                @csrf
                @method('PUT')
                
                <h1>{{$task->title}}</h1>

                <div class="form-container">

                    <div class="input-container">
                        <label for="title">Titulo de la tarea</label>
                        <input id="title" type="text" name="title" value="{{$task->title}}" required>
                    </div>
                        
                    <div class="input-container">
                        <label for="description">Descripción</label>
                        <textarea id="description" name="description">{{$task->description}}</textarea>
                    </div>

                    <div class="cb-container">
                        <label for="done">Hecho:</label>
                        <input id="done" type="checkbox" name="done" value="1" @if($task->done) checked @endif>
                    </div>
                    
                    <br>

                    <div class="input-container">
                        <label for="categories">Categoria:</label>
                        
                        <select name="categories[]" id="categories">
                            @foreach ($categories as $category)

                                <option style="color: {{$category->color}}" value="{{$category->id}}"
                                    @if($task->categories[0]->id == $category->id) selected @endif    
                                >{{$category->name}}</option>

                            @endforeach
                        </select>

                    </div>

                    <input type="submit" value="Editar">
                </div>

            </form>

            <form action="/task/{{$task->id}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="form-container-del">
                    <input class="input-delete" type="submit" value="Eliminar">
                </div>
            </form>

        </div>

    </body>
</html>