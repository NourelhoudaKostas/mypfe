<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['playlist_id', 'question_text'];

    public function playlist()
    {
        return $this->belongsTo(Playliste::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
