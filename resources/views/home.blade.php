<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TareApp</title>
        @vite(['resources/css/app.css', 'resources/css/home.css',])
    </head>

    <body>
        
        <div class="container">
            <h1>TareApp</h1>
            <div class="anchors-container">
                <a href="/task">Ver listado de tareas</a>
                <a href="/task/create">Crear tarea nueva</a>
            </div>
        </div>

    </body>
</html>