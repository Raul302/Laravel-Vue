<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\persona as Persona;

class TwoController extends Controller
{
    //

    public function index(Request $request)
    {
        if($request->ajax())
        {
            return Persona::all();
        }
        $persona = Persona::all();
        return view('Form.Two', 
        ['datos' => $persona]);
    }
    public function Insertar(Request $request)
    {
        $persona = new Persona;
        if($request->ajax())
        {
            $persona->nombre = $request->nombre.'ajax';
            $persona->apellidos = $request->apellidos;
            $persona->sexo = $request->sexo;
            $persona->edad = $request->edad;
            $persona->save();
            return response()->json(['alumno'=>$persona],200);

        }
        $persona->nombre = $request->nombre.'php';
        $persona->apellidos = $request->apellidos;
        $persona->sexo = $request->sexo;
        $persona->edad = $request->edad;
        $persona->save();
    }
    public function Borrar(Request $request)
    {
        $id=$request->id;
        $persona = Persona::findOrFail($id);
        if($request->ajax())
        {
            $persona->delete();
            return ['message'=> 'User Deleted'];
        }
        $persona->delete();
        $persona = Persona::all();
        return view('Form.Two', 
        ['datos' => $persona]);
        //delete user
                // Un angel malvado me a engañado,y vivo el sufrimiento de estar a su lado...
    }
    public function Editar(Request $request,$id)
    {
        
        $persona = Persona::findOrFail($id);
        if($request->ajax())
        {
            $persona->update($request->all());
            return ['message'=> 'User Update'];
        }
        $persona->update($request->all());
        $persona = Persona::all();
        return view('Form.Two', 
        ['datos' => $persona]);
        //delete user
                // Un angel malvado me a engañado,y vivo el sufrimiento de estar a su lado...
    }
}
