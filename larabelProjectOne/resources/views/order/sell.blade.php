<!DOCTYPE html>
<html lang="es">
    @include('components.header')

<body>
    <div class="container text-center">
        <h1>Ventas - {{ count($orders)}}</h1>
    </div>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Id cliente</th>
                <th>Id producto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$order->user}}</td>
                <td>{{$order->product}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
<footer>
@include('components.footer')
</footer>
</html>