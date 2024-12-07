<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <article> 
        <a href="{{route('proveedor')}}"> 
            <section>
                <h2>Create Proveedor</h2> 
        </a>
        </section>
        <a href="{{route('categoria')}}">
            <section>
                <h2>Create Category</h2>
            </section>
        </a>
        
    </article>
    <form action="{{route('add.product')}}" method="post"> 
        @csrf 
        <input type="text" name="product" placeholder="Name product" required>
        <input type="number" min="0" name="price" placeholder="Price product" required>
        <input type="number" name="stock" placeholder="Stock Product" required>
        <select name="category_id" required>
            <option value="" disabled selected>Select Category</option>
            @foreach($categorias as $categoria) 
            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
            @endforeach
        </select>
        <select name="provider.id" required>  
            <option value="" disabled selected>Select Provider</option>
            @foreach($proveedores as $proveedor) 
            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option> 
            @endforeach
        </select>
        <input type="submit" value="Add product"> 
    </form>

    <h2>Products list</h2>
    <table>
        <thead>
            <th>ID</th>
            <th>Name Product</th>
            <th>Price Product</th>
            <th>Stock</th>
            <th>Create date</th>
            <th colspan="2">ACTIONS</th>  
        </thead>
        <tbody>
            @foreach($productos as $producto) 
            <tr>
                <td>{{$producto->id}}</td> 
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->precio}}</td>
                <td>{{$producto->stock}}</td>
                <td>{{$producto->created_at->format("Y-m-d H:i:s")}}</td> 
                <td>
                    <a href="{{route('editar.producto', $producto->id)}}">Edit</a> 
                </td>
                <td>
                    <form action="{{route('eliminar.producto', $producto->id)}}" method="post" style="display:inline;"> 
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none;border:none;color:#007bff;text-decoration:underline;cursor:pointer;">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
