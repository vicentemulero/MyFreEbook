<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Download;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DownloadBookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userDownloadBook($idBook)
    {
        $book= Book::find($idBook);
        $params=["book_id"=>$idBook,
        "user_id"=> Auth::user()->id];
        Download::create($params);
        return Storage::download($book->download_link);
    }
}
