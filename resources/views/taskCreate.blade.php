<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear Tarea</title>
        @vite(['resources/css/app.css'])
    </head>

    <body>

        <a href="/task" class="anchor-back">Volver Atras</a>

        <form action="/task" method="post">
            @csrf

            <div class="container">
                
                <h1>Crear nueva tarea</h1>

                <div class="form-container">

                    

                    <div class="input-container">
                        <label for="title">Titulo de la tarea</label>
                        <input id="title" type="text" name="title" required>
                    </div>
                    
                    <div class="input-container">
                        <label for="description">Descripción</label>
                        <textarea id="description" name="description"></textarea>
                    </div>

                    <div class="input-container">
                        <label for="categories">Categoria:</label>
                        
                        <select name="categories[]" id="categories">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="submit" value="Crear">
                </div>

            </div>



        </form>

        <br>
        
    </body>
</html>