<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Download;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DownloadBookController extends Controller
{

    /**
     *Allows access only to the logged users
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Download the specified resource.
     *
     * @param  int  $idBook
     * @return \Illuminate\Http\Response
     */
    public function userDownloadBook($idBook)
    {
        $book = Book::find($idBook);
        $params = [
            "book_id" => $idBook,
            "user_id" => Auth::user()->id
        ];
        Download::create($params);
        return Storage::download($book->download_link);
    }
}
