<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    // Metodo encargado de mostrar la pagina principal
    public function index(){
        $cursos = Curso::orderBy('id','desc')->paginate();
        return view('cursos.index', compact('cursos'));
    }
    // Metodo encargado de crear un curso
    public function create(){
        return view('cursos.create');
    }

    public function store(Request $request){

        //return $request->all(); //permite ver lo que trae el parametro $request

        $request->validate([                // Con esto validamos los campos que son obligatorios
            'name' => 'required',
            'descripcion' =>'required',
            'categoria' => 'required'
        ]);

        // Rescatamos la informacion del formulario  y lo guardamos en la base de datos
        $curso = new Curso();

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;
        $curso->save();
        return redirect()->route('cursos.show', $curso->id); // Nos redirecciona a una vista del curso creado, si no queda una pantalla en blanco
    }
    // Metodo encargado de mostrar todos los cursos
    public function show($id){
        $curso =  Curso::find($id);        
        // compact('curso') es lo mismo que ['curso'=> $curso]
        return view('cursos.show', compact('curso'));
    }

    // Las funciones Show and Edit  se traen el registro, formas diferentes
    
    public function edit(Curso $curso){  // (Curso $curso) esto esta instanciando la clase curso cuya id se envia por la URL

        return view('cursos.edit', compact('curso'));        
    }

    public function update(Request $request,Curso $curso){
        
        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;
        $curso->save();

        return view('cursos.show', compact('curso'));  
    }
}
