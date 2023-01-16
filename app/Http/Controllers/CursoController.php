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

        $request->validate([
            'name' => 'required',
            'descripcion' =>'required',
            'categoria' => 'required'
        ]);


        $curso = new Curso();

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;
        $curso->save();
        return redirect()->route('cursos.show', $curso->id);
    }
    // Metodo encargado de mostrar todos los cursos
    public function show($id){
        $curso =  Curso::find($id);
        
        // compact('curso') es lo mismo que ['curso'=> $curso]
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso){

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
