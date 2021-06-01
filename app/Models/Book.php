<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{


    protected $fillable = [
        'cover_link',
        'title',
        'author_id',
        'genre_id',
        'average_rating',
        'synopsis',
        'download_link',
    ];

    public function genres()
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'cod');
    }

    public function authors()
    {
        return $this->belongsTo(Author::class,'author_id');
    }

    public function downloads()
    {
        return $this->hasMany(Download::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


}
