<?php

namespace App\Http\Controllers\ApiActions;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\User;

class SearchApiController extends Controller
{


    public function book()
    {
        $text = $_GET["text"];

        $book = Book::where('books.id', '=', $text)
            ->orWhere('books.title', 'like', "%$text%")
            ->select('books.*', 'authors.name as author_name', 'genres.name as genre_name')
            ->leftJoin('authors', 'authors.id', '=', 'books.author_id')
            ->rightJoin('genres', 'genres.cod', '=', 'books.genre_id')
            ->orderBy('books.id')
            ->take(1)
            ->get();

        return response()->json($book, 200);
    }


    public function author()
    {
        $text = $_GET["text"];

        $author = Author::where('authors.id', '=', $text)
            ->orWhere('authors.name', 'like', "%$text%")
            ->select('authors.*')
            ->take(1)
            ->get();

        return response()->json($author, 200);
    }

    public function genre()
    {
        $text = $_GET["text"];

        $genre = Genre::where('genres.cod', 'like', $text)
            ->orWhere('genres.name', 'like', "%$text%")
            ->select('genres.*')
            ->take(1)
            ->get();

        return response()->json($genre, 200);
    }

    public function user()
    {
        $text = $_GET["text"];

        $user = User::where('users.id', '=', $text)
            ->orWhere('users.name', 'like', "%$text%")
            ->orWhere('users.email', 'like', "%$text%")
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.*', 'roles.name as rol')
            ->take(1)
            ->get();
        return response()->json($user, 200);
    }
}
