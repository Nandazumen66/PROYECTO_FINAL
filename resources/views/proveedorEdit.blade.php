<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{route('add.proveedor')}}" method="post">
        <input type="text" name="{{$proveedor->id}}" placeholder="{{$proveedor->id}}" hidden>
        <input type="text" name="nombre" placeholder="{{$proveedor->nombre}}">
        <input type="text" name="direccion" placeholder="{{$proveedor->direccion}}">
        <input type="text" name="telefono" placeholder="{{$proveedor->telefono}}">
        <input type="email" name="correo" placeholder="{{$proveedor->correo}}">
        <input type="tel" name="contacto" placeholder="{{$proveedor->contacto}}">
        <textarea name="descripcion" cols="30" rows="10" value="{{$proveedor->descripcion}}">

        </textarea>
        <input type="submit" value="Editar Proveedor">
    </form>
</body>
</html>