<!DOCTYPE html>
@include('components.header')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form class="form-horizontal" action="{{ route('product.store')}}" method="post">
                        @csrf
                        <fieldset>
                            <legend class="text-center header">Formulario para crear producto</legend>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="name" name="name" type="text" placeholder="Nombre del producto" class="form-control">
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
                                    <input id="description" name="description" type="text" placeholder="Descripcion" class="form-control">
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
                                    <input id="price" name="price" type="number" placeholder="Precio" class="form-control">
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