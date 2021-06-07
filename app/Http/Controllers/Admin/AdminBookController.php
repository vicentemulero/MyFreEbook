<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminBookController extends Controller
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
        $books = Book::OrderBy('title')->paginate(14);
        return view('book.booksList', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('book.formCreateBook', compact('genres', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = request()->except('_token');

        if ($request->hasFile('cover_link')) {
            $coverName = request()->file('cover_link')->getClientOriginalName();
            $cover = request()->file('cover_link');
            Storage::putFileAs('public/covers', $cover, $coverName);
            $book['cover_link'] = 'storage/covers/' . $coverName;
        }

        if ($request->hasFile('download_link')) {
            $ebookName = request()->file('download_link')->getClientOriginalName();
            $ebook = request()->file('download_link');
            Storage::putFileAs('public/ebooks', $ebook, $ebookName);
            $book['download_link'] = 'public/ebooks/' . $ebookName;
        }

        Book::create($book);
        return redirect()->route('AdminBook.index')->with('success', 'Libro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('book.profileBook', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = Author::all();
        $book = Book::find($id);
        $genres = Genre::all();
        return view('book.formEditBook', compact('book', 'genres', 'authors'));
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
        $oldBook = request()->all();
        $book = request()->except('_token', 'old_cover_link', 'old_download_link');

        if ($request->hasFile('cover_link')) {
            File::delete($oldBook['old_cover_link']);
            $cover = request()->file('cover_link');
            $coverName = request()->file('cover_link')->getClientOriginalName();
            Storage::putFileAs('public/covers', $cover, $coverName);
            $book['cover_link'] = 'storage/covers/' . $coverName;
        } else {
            $book['cover_link'] = $oldBook['old_cover_link'];
        }

        if ($request->hasFile('download_link')) {
            File::delete($oldBook['old_download_link']);
            $ebook = request()->file('download_link');
            $ebookName = request()->file('download_link')->getClientOriginalName();
            Storage::putFileAs('public/ebooks', $ebook, $ebookName);
            $book['download_link'] = 'public/ebooks/' . $ebookName;
        } else {
            $book['download_link'] = $oldBook['old_download_link'];
        }

        Book::findOrFail($request->get('id'))->update($book);

        Log::info("Libro con id: " . $request->get('id') . " modificado con éxito");
        return redirect()->route('AdminBook.index')->with('success', 'Libro modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        try {
            File::delete($book->cover_link);
            File::delete($book->download_link);
            $book->delete();
            Log::info("Libro con id: $id eliminado con éxito");
            return redirect()->route('AdminBook.index')->with('success', 'Libro borrado con éxito');
        } catch (Exception $e) {
            Log::error("No se ha podido eliminar el libro con id: $id");
            return redirect()->route('AdminBook.index')->with('error', 'No se ha podido eliminar el libro.');
        }
    }
}
