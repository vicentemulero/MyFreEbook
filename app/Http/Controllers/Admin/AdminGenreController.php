<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Genre;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminGenreController extends Controller
{
    /**
     *Allows access only to the administrator user
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::OrderBy('name')->paginate(10);
        return view('genre.genreList', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genre.formCreateGenre');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Genre::create($request->all());
        return redirect()->route('AdminGenre.index')->with('success', 'Género creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genres = Genre::all();
        $genre = Genre::find($id);
        return view('genre.formEditGenre', compact('genre', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            Genre::findOrFail($request->get('cod'))->update($request->all());
            return redirect()->route('AdminGenre.index')->with('success', 'Género modificado con éxito');
        } catch (Exception $e) {
            return redirect()->route('AdminGenre.index')->with('error', 'No se ha podido modificar el género');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        try {
            $genre->delete();
            Log::info("Género con id: $id eliminado con éxito");
            return redirect()->route('AdminGenre.index')->with('success', 'Género eliminado con éxito');
        } catch (Exception $e) {
            Log::error("No se ha podido eliminar el género con id: $id");
            return redirect()->route('AdminGenre.index')->with('error', 'No se ha podido eliminar el género.');
        }
    }
}
