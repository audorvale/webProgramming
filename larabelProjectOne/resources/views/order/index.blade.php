<!DOCTYPE html>
<html lang="es">
    @include('components.header')

<body>
    <div class="container text-center">
        <h1>Productos - {{ count($products)}}</h1>
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

                    <form action="{{ route('order.sell')}}" method="post">
                        @csrf
                        <select name="user" id="user">
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>                                
                            @endforeach
                        </select>
                        @error('user')
                            <br>
                            <small class="text-danger">*{{$message}}</small>
                            <br>
                        @enderror
                        <input type="text" value="{{$product->product_id}}" name="product" hidden>
                        @error('product')
                            <br>
                            <small class="text-danger">*{{$message}}</small>
                            <br>
                        @enderror
                        <button type="submit" class="btn btn-success">
                            Vender
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
