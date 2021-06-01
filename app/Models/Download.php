<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{


    protected $fillable = [
        'book_id',
        'user_id',
    ];

    public function books()
    {
        return $this->belongsTo(Book::class, "book_id");
    }

    public function users()
    {
        return $this->belongsTo(User::class, "user_id");
    }


}
