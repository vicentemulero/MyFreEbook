<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Download;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Book $book
     * @return \Illuminate\Http\Response
     */
    public function showBook(Book $book)
    {
        $othersBooks = Book::where('genre_id', 'like', "$book->genre_id")->where('id', '!=', "$book->id")->paginate(32);

        $sqlRate = "SELECT count(*) as rate from reviews where book_id = $book->id";
        $queryRate = DB::select($sqlRate);
        $usersRate = floatval($queryRate[0]->rate);

        $sqlAverage = "SELECT avg(qualify) as averageStar from reviews where book_id = $book->id";
        $queryAverage = DB::select($sqlAverage);
        $resultAverage = floatval($queryAverage[0]->averageStar);
        $averageRate = round($resultAverage, 0, PHP_ROUND_HALF_UP);

        if (Auth::check()) {

            $user = Auth::user()->id;

            $ownComments = Book::select('reviews.commentary', 'users.name')->join('reviews', 'books.id', '=', 'reviews.book_id')
                ->join('users', 'reviews.user_id', '=', 'users.id')->where('reviews.book_id', '=', $book->id)->where('reviews.user_id', '=', $user)
                ->where('reviews.commentary', '!=', NULL)->get();

            $comments = Book::select('reviews.commentary', 'reviews.created_at', 'users.name')->join('reviews', 'books.id', '=', 'reviews.book_id')
                ->join('users', 'reviews.user_id', '=', 'users.id')->where('reviews.book_id', '=', $book->id)->where('reviews.user_id', '!=', $user)
                ->where('reviews.commentary', '!=', NULL)->orderBy('reviews.created_at')->paginate(10);
            return view('book.showBooks', compact('book', 'othersBooks', 'averageRate', 'usersRate', 'ownComments', 'comments'));
        } else {
            $comments = Book::select('reviews.commentary', 'reviews.created_at', 'users.name')->join('reviews', 'books.id', '=', 'reviews.book_id')
                ->join('users', 'reviews.user_id', '=', 'users.id')->where('reviews.book_id', '=', $book->id)->where('reviews.commentary', '!=', NULL)
                ->orderBy('reviews.created_at')->paginate(10);
        }

        return view('book.showBooks', compact('book', 'othersBooks', 'averageRate', 'usersRate', 'comments'));
    }

    /**
     *  Check if it has already been rated before and create a new rating
     *
     *  @return \Illuminate\Http\Response
     */
    public function setQualify(Request $request)
    {

        $review = request()->all();
        $bookID = $review['book_id'];
        $userID = $review['user_id'];
        $qualify = $review['qualify'];
        $commentary = $review['commentary'];

        $isDownloaded = Download::where('book_id', '=', $bookID)->where('user_id', '=', $userID)->first();

        if (!$isDownloaded) {
            return redirect()->back()->with('danger', 'No puedes dejar una valoración si no has descargado el libro');
        } else {
            $wasQualified = Review::where('book_id', 'like', $bookID)->where('user_id', 'like', $userID)->first();
            $wasCommented = Review::where('book_id', 'like', $bookID)->where('user_id', 'like', $userID)->where('commentary', '!=', NULL)->first();

            if ($qualify == NULL && $commentary == NULL) {
                return redirect()->back()->with('error', 'Introduce una valoración o un comentario');
            } elseif ($wasQualified && $wasCommented) {
                return redirect()->back()->with('danger', 'No puedes valorar ni comentar este libro de nuevo');
            } elseif ($wasQualified && $qualify != NULL) {
                return redirect()->back()->with('danger', 'No puedes valorar este libro de nuevo');
            } elseif (!$wasQualified && $commentary != NULL) {
                return redirect()->back()->with('danger', 'Envía tu valoración y vuelve para comentar este libro');
            } elseif ($wasQualified && $qualify == NULL && !$wasCommented && $commentary != NULL) {
                Review::where('book_id', 'like', $bookID)->where('user_id', 'like', $userID)->update(['commentary' => $commentary]);
                return redirect()->back()->with('success', 'Tu comentario se ha añadido correctamente');
            } elseif (!$wasQualified) {

                Review::create($review);
                $sqlAverage = "SELECT avg(qualify) as averageStar from reviews where book_id = $bookID";
                $queryAverage = DB::select($sqlAverage);
                $resultAverage = floatval($queryAverage[0]->averageStar);
                $averageRate = round($resultAverage, 0, PHP_ROUND_HALF_UP);
                Book::findOrFail($bookID)->update(['average_rating' => $averageRate]);
                return redirect()->back()->with('success', 'Tu valoración se ha añadido correctamente');
            }
        }
    }
}
