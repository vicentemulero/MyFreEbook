<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Download;
use App\Models\Genre;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    /**
     * Show the home page with needed resources
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $genres = Genre::all();

        $latestBooks = Book::orderBy('created_at', 'desc')->take(6)->get();

        $sqlMost = 'SELECT COUNT(downloads.book_id) as downloadsBook, authors.name , books.* FROM authors JOIN books on books.author_id = authors.id
       JOIN downloads on downloads.book_id = books.id GROUP BY authors.id, authors.name, authors.created_at,authors.updated_at,books.id, books.cover_link , books.title,
       books.author_id , books.genre_id, books.average_rating, books.synopsis, books.download_link, books.created_at, books.updated_at ORDER BY downloadsBook DESC LIMIT 6';
        $mostReadBooks = DB::select($sqlMost);

        $sqlBest = 'SELECT AVG(reviews.qualify) as reviewBooks, authors.name, books.* FROM authors JOIN books on books.author_id = authors.id
       JOIN reviews on reviews.book_id = books.id GROUP BY authors.id, authors.name, authors.created_at,authors.updated_at,books.id, books.cover_link , books.title,
       books.author_id , books.genre_id, books.average_rating, books.synopsis, books.download_link, books.created_at, books.updated_at ORDER BY reviewBooks DESC LIMIT 6';
        $bestsBooks = DB::select($sqlBest);

        $countBooks = Book::all()->count();
        $countDownloads = Download::all()->count();
        $countRatings = Review::all()->count();

        return view('book.welcome', compact('genres', 'latestBooks', 'mostReadBooks', 'bestsBooks', 'countBooks', 'countDownloads', 'countRatings'));
    }


    /**
     * Show the page with all books
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function allBooks()
    {
        $books = Book::orderBy('title')->paginate(18);
        $defaultOption = "name";
        return view('book.welcomeAllbooks', compact('books', 'defaultOption'));
    }

    /**
     * Show the form for contact
     */
    public function contact()
    {

        return view('user.formContact');
    }

    /**
     * Shows the page about the web information
     */
    public function about()
    {

        return view('user.about');
    }

    /**
     * Sort the books according to the parameter selected in the view
     *
     * @return \Illuminate\Http\Response
     */
    public function sortBooks()
    {


        if (!empty($_GET['orderBy'])) {

            session(['option' => $_GET['orderBy']]);
            $option = session('option');
        }

        $option = session('option');

        if ($option === 'mostReadBooks') {

            $books = DB::table('authors')
                ->select('books.*', 'authors.name', DB::raw('COUNT(downloads.book_id) as downloadsBook'))
                ->join('books', 'books.author_id', '=', 'authors.id')
                ->join('downloads', 'downloads.book_id', '=', 'books.id')
                ->groupBy(
                    'authors.id',
                    'authors.name',
                    'authors.created_at',
                    'authors.updated_at',
                    'books.id',
                    'books.cover_link',
                    'books.title',
                    'books.author_id',
                    'books.genre_id',
                    'books.average_rating',
                    'books.synopsis',
                    'books.download_link',
                    'books.created_at',
                    'books.updated_at'
                )
                ->orderBy('downloadsBook', 'desc')
                ->paginate(18);

            return view('book.welcomeAllbooks', compact('books', 'option'));
            session()->forget('option');
        } elseif ($option === 'name') {
            $defaultOption = 0;
            $books = Book::orderBy('title')->paginate(18);

            return view('book.welcomeAllbooks', compact('books', 'option', 'defaultOption'));
            unset($_SESSION['option']);
            session()->forget('option');
        } elseif ($option === 'latestBooks') {
            $defaultOption = 0;
            $books = Book::orderBy('created_at', 'desc')->paginate(18);
            return view('book.welcomeAllbooks', compact('books', 'option', 'defaultOption'));
            unset($_SESSION['option']);
            session()->forget('option');
        } else if ($option === 'bestsBooks') {

            $books = DB::table('authors')
                ->select('books.*', 'authors.name', DB::raw('AVG(reviews.qualify) as reviewBooks'))
                ->join('books', 'books.author_id', '=', 'authors.id')
                ->join('reviews', 'reviews.book_id', '=', 'books.id')
                ->groupBy(
                    'authors.id',
                    'authors.name',
                    'authors.created_at',
                    'authors.updated_at',
                    'books.id',
                    'books.cover_link',
                    'books.title',
                    'books.author_id',
                    'books.genre_id',
                    'books.average_rating',
                    'books.synopsis',
                    'books.download_link',
                    'books.created_at',
                    'books.updated_at'
                )
                ->orderBy('reviewBooks', 'desc')
                ->paginate(18);

            return view('book.welcomeAllBooks', compact('books', 'option'));
            unset($_SESSION['option']);
            session()->forget('option');
        };
    }
}
