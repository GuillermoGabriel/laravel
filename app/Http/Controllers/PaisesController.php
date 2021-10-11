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

        $request->validate([
            'txt_nombres'=>'required',
            'txt_poblacion'=>'required',
            'txt_continente'=>'required'
            
        ]);
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
        $nacionalidad=pais::findOrFail($id);
        return view('paises.eliminar',compact('nacionalidad'));
        
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
        //return 'estoy en el metodo update';
        $pais=pais::findOrFail($id);
        $pais->Nombres=$request->txt_nombres;   
        $pais->Poblacion=$request->txt_poblacion;
        $pais->Continente=$request->txt_continente;
        //Aqui guardo en la bd

        if ($pais->save()) {
            Session::flash('exito','Editado correctamente');
            return Redirect::to('paises');
        }
        else{
            Session::flash('error','Ocurrio un error al editar, verifique!');
            return Redirect::to('paises/'.$id.'/edit');
        }      

       
    }

    
    public function destroy($id)
    {
        try{
            pais::destroy($id);
            Session::flash('exito','Eliminado correctamente');
            return Redirect::to('paises');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Session::flash('error',$e);
            return Redirect::to('paises');
            

        }
    }
}
