<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('layout.script_cabezera')
    
</head>
        

    <body>

        <div class="container">

            <H1 class="Index">Paises</H1>
            <a class="btn btn-sm btn-success" href="{{url('paises/create')}}">Registrar Pais <i class="fas fa-plus"></i></a>


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


    <table class="table table-striped">

        <thead>
            <tr>
                
                <th scope="col">Nombres</th>
                <th scope="col">Poblacion</th>
                <th scope="col">Continente</th>
                <th scope="col">acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach($registros as $registro)

                <tr>
                    

                    <td>{{$registro->Nombres}}</td>
                    <td>{{$registro->Poblacion}}</td>
                    <td>{{$registro->Continente}}</td>


                    <td>
                        <a class="btn btn-sm btn-info" href="{{route('paises.edit',$registro->ID)}}"><i class="fas fa-edit"></i></a>

                        <a class="btn btn-sm btn-danger" href=""><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach           
        </tbody>



    </table>

        </div>
    </body>
    @include('layout.script_pie')
</html>