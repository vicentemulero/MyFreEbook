<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchBook()
    {
        $search= $_GET['search'];
        $books = Book::where("title","like","%$search%")->orderBy('title')->get();
        return view('search.foundBook',compact('books','search'));
    }

    public function searchBooksGenre($genre)
    {
        $books = Book::where("genre_id","=","$genre")->orderBy('title')->get();
        $genreSearch= Genre::find($genre);
        return view('search.foundBookForGenre',compact('books','genreSearch'));
    }

    public function searchAuthor($initialLetter)
    {
       $authors= Author::where('name', 'like', "$initialLetter%")->orderBy('name')->paginate(20);
       return view('search.foundAuthor',compact('authors','initialLetter'));
    }

  public function searchBooksAuthor(Author $author)
    {
       $books= $author->books;
        return view('search.foundAuthorBooks',compact('author','books'));
    }

}
