<?php

namespace App\Http\Controllers;
use App\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $libros = Book::all();
        return view('libro.todos', ['libros' => $libros->toArray()]);
    }

    public function show($id)
    {
        $libro = Book::find($id);
        if (!is_null($libro))
            return view('libro.mostrar', ['libro' => $libro->toArray()]);
        else
            return response('no encontrado', 404);
    }
    public function create()
    {
        return view('libro.formlibro');
    }

    public function store(Request $request)
    {
    
        $libro = new Book();
        $libro->name = $request["name"];
        $libro->author = $request["author"];
        $libro->isbn = $request["isbn"];
        $libro->save();
        return 'Libro guardado';
        
    }

}
