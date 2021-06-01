<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

    protected $primaryKey = 'cod';
    protected $keyType = 'string';

    protected $fillable = [
        'cod',
        'name',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
