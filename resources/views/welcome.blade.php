<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                    </thead>
                    <tbody>
                        @foreach($inventarios as $inventario)
                        <tr>
                            <td>{{$inventario->id}}</td>
                            <td>{{$inventario->productos->nombre_producto}}</td>
                            <td>{{$inventario->cantidad}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</body>

</html>