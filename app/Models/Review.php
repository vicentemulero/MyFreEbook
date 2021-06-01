<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{


    protected $fillable = [
        'qualify',
        'book_id',
        'user_id',
        'commentary',
    ];

    public function books()
    {
        return $this->belongsTo(Book::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }


}
