<!DOCTYPE html>
<html lang="es">
    @include('components.header')

<body>
    <div class="container text-center">
        <h1>Clientes - {{ count($clients)}}</h1>
        <a href="{{ route('client.create')}}">
            <button class="btn btn-success">
                Crear Cliente
            </button>
        </a>
    </div>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Identificador</th>
                <th>Nombre Cliente</th>
                <th>Email</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$client->id}}</td>
                <td>{{$client->name}}</td>
                <td>{{$client->email}}</td>
                <td>
                    <a href="{{route('client.edit',$client-> id)}}">
                        <button>
                            Editar
                        </button>
                    </a>
                    <form action="{{ route('client.destroy',$client -> id)}}" method="post">
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