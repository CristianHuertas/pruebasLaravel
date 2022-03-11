<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    
    public function inicio()
    {
        $notas = App\Models\Nota::Paginate(3);
        return view('welcome', compact('notas'));
    }

    public function detalle($id)
    {
        //ojo NOTA en singular
        $nota = App\Models\Nota::findOrFail($id);
        return view('notas.detalle', compact('nota'));
    }

    // crear nuevo objeto
    public function crear(Request $request)
    {
        //validacion de datos:
        $request->validate(['nombre' => 'required', 'descripcion' => 'required']);

        //return $request->all();
        //da el modelo de Nota a la variable $notaNueva
        $notaNueva = new App\Models\Nota;
        //asigna los atributis de la pagina a la variable con el modelo
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;

        //guarda en la base de datos
        $notaNueva->save();
        //back devuelve a la vista anterior
        return back()->with('mensaje', 'Nota Agregada');
    }

    //Consulta el id para luego hacer los cambios
    public function editar($id)
    {
        $nota = App\Models\Nota::findOrFail($id);
        return view('notas.editar', compact('nota'));
    }

    //edita el id consultado
    public function update(Request $request, $id){
        $notasUpdate= App\Models\Nota::findOrFail($id);
        $notasUpdate->nombre = $request->nombre;
        $notasUpdate->descripcion = $request->descripcion;
        $notasUpdate->save();

        //back devuelve a la vista anterior
        return back()->with('mensaje', 'Nota actualizada');
    }

    //Eliminar un id consultado
    public function eliminar ($id){
        $notaEliminar = App\Models\Nota::findOrFail($id);
        $notaEliminar->delete();
        return back()->with('mensaje', 'Nota eliminada');

    }

    public function fotos()
    {
        return view('fotos');
    }

    public function blog()
    {
        return view('blog');
    }

    public function nosotros($nombre = null)
    {
        $equipo = ['Ignacio', 'Juanito', 'Pedrito'];

        //return view('nosotros', ['equipo'=>$equipo], ['nombre'=>$nombre]);
        return view('nosotros', compact("equipo"), compact('nombre'));
    }
}
