<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Proveedor</title>
</head>

<body>
    <a href="{{route('home')}}">
        <section>
            <h2>Crear Producto</h2>
        </section>
    </a>
    <form action="{{route('add.proveedor')}}" method="post">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre Proveedor">
        <input type="text" name="direccion" placeholder="Direccion Proveedor">
        <input type="text" name="telefono" placeholder="Telfono Porveedor">
        <input type="email" name="correo" placeholder="Correo Proveedor">
        <input type="tel" name="contacto" placeholder="Contacto Proveedor">
        <textarea name="descripcion" cols="30" rows="10">

        </textarea>
        <input type="submit" value="Crear Proveedor">
    </form>

    <h2>List Proveedores</h2>
    <table>
        <thead>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Contacto</th>
            <th colspan="2">Actions</th>

        </thead>
        <tbody>
            @foreach($proveedores as $proveedor)
            <tr>
                <td>{{$proveedor->id}}</td>
                <td>{{$proveedor->nombre}}</td>
                <td>{{$proveedor->direccion}}</td>
                <td>{{$proveedor->telefono}}</td>
                <td>{{$proveedor->correo}}</td>
                <td>{{$proveedor->contacto}}</td>
                <td>
                    <a href="{{route('proveedores.edit.view', $proveedor->id)}}">Edit</a>
                </td>
                <td>
                    <a href="{{route('proveedores.destroy', $proveedor->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>