<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class playliste extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'title', 'description'];

    /**
     * Get the course that owns the playlist.
     */
    public function course()
    {
        return $this->hasMany(Course::class , 'playliste_id');
    }

    /**
     * Get the questions for the playlist.
     */
    public function questions()
    {
        return $this->hasMany(Question::class , 'playlist_id');


    }

    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}
