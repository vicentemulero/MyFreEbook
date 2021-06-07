<?php

namespace App\Http\Controllers\ApiActions;

use App\Http\Controllers\Controller;
use App\Models\Review;


class UserCommentaryApiController extends Controller
{


    /**
     * Create a new comment on the review
     * @return \Illuminate\Http\Response
     */
    public function editCommentary()
    {
        $newCommentary = $_GET["newCommentary"];
        $userId = $_GET["userId"];
        $bookId = $_GET["bookId"];


        Review::where('user_id', '=', $userId)
            ->where('book_id', '=', $bookId)
            ->update(['commentary' => $newCommentary]);

        return response(200);
    }

    /**
     * Remove a comment from the review
     * @return \Illuminate\Http\Response
     */
    public function deleteCommentary()
    {
        $userId = $_GET["userId"];
        $bookId = $_GET["bookId"];

        Review::where('user_id', '=', $userId)
            ->where('book_id', '=', $bookId)
            ->update(['commentary' => NULL]);

        return response(200);
    }
}
