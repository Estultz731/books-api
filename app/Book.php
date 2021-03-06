<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'publication_date', 'author_id'];

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }
}
