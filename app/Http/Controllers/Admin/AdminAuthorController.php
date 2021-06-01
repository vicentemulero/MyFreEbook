<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminAuthorController extends Controller
{
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
        $authors = Author::OrderBy('name')->paginate(14);
        return view('Author.AuthorList', compact('authors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Author.formCreateAuthor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Author::create($request->all());
        return redirect()->route('AdminAuthor.index')->with('success','Autor creado con éxito');
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
        $author = Author::find($id);
        return view('Author.formEditAuthor', compact('author'));
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
        try{
        Author::findOrFail($request->get('id'))->update($request->all());
        Log::info("Autor con id:".$request->get('id')." modificado con éxito");
        return redirect()->route('AdminAuthor.index')->with('success','Autor modificado con éxito');
    } catch (Exception $e) {
        Log::error("No se ha podido actualizar el autor con id:".$request->get('id'));
        return redirect()->route('AdminAuthor.index')->with('error','No se ha podidio modificar el autor');
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
        $author = Author::findOrFail($id);
        try {
            $author->delete();
            Log::info("Autor con id: $id eliminado con éxito");
            return redirect()->route('AdminAuthor.index')->with('success','Autor eliminado con éxito');
        } catch (Exception $e) {
            Log::error("No se ha podido eliminar el autor con id: $id");
            return redirect()->route('AdminAuthor.index')->with('error','No se ha podido eliminar el autor.');
        }
    }
}
