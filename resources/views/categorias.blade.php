<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
</head>

<body>
    <a href="{{route('home')}}">
        <section>
            <h2>Categoría</h2>
        </section>
    </a>
    <form action="{{route('add.categoria')}}" method="post">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre Categoría">
        <input type="text" name="descripcion" placeholder="Descripción Categoría">
        <input type="submit" value="Crear Categoría">
    </form>

    <h2>Listar Categorías</h2>
    <table>
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th colspan="2">Actions</th>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->Nombre}}</td>
                <td>{{$categoria->Descripcion}}</td>
                <td>
                    <a href="{{route('categoria.edit.view', $categoria->id)}}">Edit</a>
                </td>
                <td>
                    <a href="{{route('categoria.destroy', $categoria->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
