<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pais;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class PaisesController extends Controller
{
  
    public function index()
    {     
        $registros=pais::get();
        //return $registros;
        return view('paises.paisesMundo',compact('registros'));
        
    }

    public function create()
    {

        //return"estoy en create";
        return view('paises.Registro');
    }
  
    public function store(Request $request)
    {

        //return $request;
        $registrar=new pais;        
        $registrar->Nombres=$request->txt_nombres;
        $registrar->Poblacion=$request->txt_poblacion;
        $registrar->Continente=$request->txt_continente;

        if ($registrar->save()) {
            Session::flash('exito','Registrado correctamente');
            return Redirect::to('paises');
        }
        else{
            Session::flash('error','Ocurrio un error al insertar, verifique!');
            return Redirect::to('paises.create');
        }
    

    }

    public function show($id)
    {

        //
        
    }

   
    public function edit($id)
    {
        //return 'id del registro es '. $id;
        $nacionalidad=pais::findOrFail($id);
        //return $nacionalidad;
        return view('paises.editar',compact('nacionalidad'));


    }

    
    public function update(Request $request, $id)
    {
        return $request;
    }

    
    public function destroy($id)
    {
        //
    }
}
