<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    // Metodo encargado de mostrar la pagina principal
    public function index(){
        $cursos = Curso::paginate();
        return view('cursos.index', compact('cursos'));
    }
    // Metodo encargado de crear un curso
    public function create(){
        return view('cursos.create');
    }
    // Metodo encargado de mostrar todos los cursos
    public function show($curso){
        // compact('curso') es lo mismo que ['curso'=> $curso]
        return view('cursos.show', compact('curso'));
    }
}
