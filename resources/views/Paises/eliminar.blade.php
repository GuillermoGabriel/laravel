<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
    @include('layout.script_cabezera')
</head>
<body>
    <div class="container">
        <h1>editar</h1>
        <hr>

        <div class="">
            <hr>
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

        <form action="{{route('paises.destroy',$nacionalidad->id)}}" method="POST">
            @method('delete')
                @csrf

                <center>
                    <h3>ATENCION!, ESTAS A PUNTO DE ELIMINAR EL SIGUIENTE REGISTRO:</h3>
                    <H4><b>{{$nacionalidad->Nombres}}</b></H4>
                    <hr>                   
                    <button type="submit" class="btn btn-danger btn-sm ">Confirmar</button>
                    <a class="btn btn-sm btn-primary " href="{{url('paises')}}">atras</a>
            
                </center>   

         </form>

    </div>
    
    
</body>
    @include('layout.script_pie')
</html>