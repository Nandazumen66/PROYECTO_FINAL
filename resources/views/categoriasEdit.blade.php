<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="{{route('add.categoria')}}" method="post">
        <input type="text" name="{{$categoria->id}}" placeholder="{{$categoria->id}}" hidden>
        <input type="text" name="Nombre" placeholder="{{$categoria->nombre}}">
        <input type="text" name="Descripcion" placeholder="{{$categoria->descripcion}}">x
        <input type="submit" value="Crear Categoría">
    </form>
</body>
</html>