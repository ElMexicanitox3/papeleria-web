<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

use App\Http\Requests\StoreCurso;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::orderBy('id', 'desc')->paginate();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(StoreCurso $request){
        // Acutlizacion de datos de forma masiva
        // $curso = new Curso();
        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;
        // $curso->save();

        // $curso = Curso::create([
        //     'name' => $request->name,
        //     'descripcion' => $request->descripcion,
        //     'categoria' => $request->categoria
        // ]);

        $curso = Curso::create($request->all());

        return redirect()->route('cursos.show', $curso->id);
    }

    public function show(Curso $curso)
    {
        // Forma 1 es un array asociativo
        // return view('cursos.show', ['curso' => $curso]);

        // Forma 2 es una funcion pero tiene que concordar con el nombre de la variable
        // Que sea igual al nombre de la variable que se esta pasando
        // return view('cursos.show', compact('curso'));
        return view('cursos.show', compact('curso'));


    }

    public function edit(Curso $curso)
    {
        // return $curso;
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso){
        
        // Validacion de datos
        $request->validate([
            'name' => 'required|max:10',
            'descripcion' => 'required|min:10',
            'categoria' => 'required'
        ]);

        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;
        // $curso->save(); 

        $curso->update($request->all());
        
        return redirect()->route('cursos.show', $curso->id);
    }
}
