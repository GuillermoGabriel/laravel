<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    @include('layout.script_cabezera')
</head>
<body>
    <div class="container">
        <h1>Nuevo Registro</h1>
        <hr>

        <div class="row">
               @if(Session('exito'))
               <div class="alert alert-success">
                    {{session('exito')}}
               </div>
               @endif
               @if(Session('error'))
               <div class="alert alert-danger">
                    {{session('error')}}
               </div>
               @endif
        </div>

        <form action="{{url('paises')}}" method="POST">

            @csrf

            

            <div class="form-group">
               <label for="exampleInputEmail1">Nombres</label>
                <input type="dni" class="form-control" id="txt_nombres" name="txt_nombres" required>
            </div>

            <div class="form-group">
               <label for="exampleInputEmail1">Poblacion </label>
                <input type="text" class="form-control" id="txt_poblacion" name="txt_poblacion">
            </div>

            <div class="form-group">
               <label for="exampleInputEmail1">Continente</label>
                <input type="text" class="form-control" id="txt_continente" name="txt_continente">
            </div>

            


                <button type="submit" class="btn btn-primary">Registrar</button>
                <a class="btn btn-sm btn-danger" href="{{url('paises')}}">atras</a>
        </form>

    </div>
    
    
        </body>
    @include('layout.script_pie')
</html>