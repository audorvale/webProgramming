<!DOCTYPE html>
@include('components.header')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form class="form-horizontal" action="{{ route('product.update',$product->product_id)}}" method="post">
                        @csrf
                        <fieldset>
                            <legend class="text-center header">Formulario para modificar producto</legend>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="product_id" name="product_id" type="text" placeholder="id" value='{{$product->product_id}}' class="form-control" hidden>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="name" name="name" type="text" placeholder="Nombre del producto" value='{{$product->name}}' class="form-control">
                                </div>
                            </div>
                            @error('name')
                                <br>
                                <small class="text-danger">*{{$message}}</small>
                                <br>
                            @enderror

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="description" name="description" type="text" placeholder="Descripcion" value='{{$product->description}}' class="form-control">
                                </div>
                            </div>
                            @error('description')
                                <br>
                                <small class="text-danger">*{{$message}}</small>
                                <br>
                            @enderror

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="price" name="price" type="number" placeholder="Precio" value='{{$product->price}}' class="form-control">
                                </div>
                            </div>
                            @error('price')
                                <br>
                                <small class="text-danger">*{{$message}}</small>
                                <br>
                            @enderror

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('components.footer')
</html>