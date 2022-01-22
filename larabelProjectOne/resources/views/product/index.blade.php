<!DOCTYPE html>
<html lang="es">
    @include('components.header')

<body>
    <div class="container text-center">
        <h1>Productos - {{ count($products)}}</h1>
        <a href="{{ route('product.create')}}">
            <button class="btn btn-success">
                Crear Producto
            </button>
        </a>
    </div>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="{{route('product.edit',$product-> product_id)}}">
                        <button>
                            Editar
                        </button>
                    </a>
                    <form action="{{ route('product.destroy',$product -> product_id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
<footer>
@include('components.footer')
</footer>
</html>