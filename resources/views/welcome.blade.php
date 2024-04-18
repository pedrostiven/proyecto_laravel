<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/aca9adbfbc.js" crossorigin="anonymous"></script>
</head>

<body>
    <h1 class="text-center p-3">CRUD en Laravel</h1>

    @if(session('correcto'))
    <div class="alert alert-success">{{session("correcto")}}</div>        
    @endif

    @if(session('incorrecto'))
    <div class="alert alert-danger">{{session("incorrecto")}}</div>        
    @endif

    <script>
        var res=function(){
            var not=confirm("¿estas seguro de que quieres elminar?");
            return not;
        }

    </script>

      <!-- Modal de registro de datos -->
  <div class="modal fade" id="modalregistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">REGISTRO DE PRODUCTO</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route("crud.create")}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">codigo del producto</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcodigo">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">nombre</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtnombre">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">precio</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtprecio">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">cantidad del producto</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcantidad">
                  </div>
                <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">REGISTRAR</button>
        </div>
              </form>
        </div>
      </div>
    </div>
  </div>

    
    <div class="p-5 table-responsive">
<button data-bs-toggle="modal" data-bs-target="#modalregistrar" class="btn btn-success btn-sm">AÑADIR PRODUCTO</button>

<table class="table table-striped table-bordered table-hover">
        <thead class="bg-primary text-white">
          <tr>
            <th scope="col">CODIGO</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">PRECIO</th>
            <th scope="col">CANTIDAD</th>
            <th></th>
          </tr>
        </thead>
        
        <tbody class="table_group-diviser">
            @foreach($datos as $item)
          <tr>
            <td>{{$item->id_producto}}</td>
            <td>{{$item->nombre}}</td>
            <td>${{$item->precio}}</td>
            <td>{{$item->cantidad}}</td>
            <td>
                <a href="" data-bs-toggle="modal" data-bs-target="#modaleditar{{$item->id_producto}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="{{route("crud.delete",$item->id_producto)}}" onclick="return res()" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
            </td>

            
  <!-- Modal de modificar datos -->
  <div class="modal fade" id="modaleditar{{$item->id_producto}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">MODIFICAR DATOS DEL PRODUCTO</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route("crud.update")}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">codigo del producto</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcodigo" value="{{$item->id_producto}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">nombre</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtnombre" value="{{$item->nombre}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">precio del producto</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtprecio" value="{{$item->precio}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">cantidad del producto</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcantidad" value="{{$item->cantidad}}">
                  </div>
                <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">modificar</button>
        </div>
              </form>
        </div>
      </div>
    </div>
  </div>

          </tr>
           @endforeach
        </tbody>
        
      </table>

    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>