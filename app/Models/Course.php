<?php

namespace App\Models;

use App\Models\playliste;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'description',
        'video_path',
        'video_name',
        'duration',
        'formateur_id'
        
    ];
   
    

    /**
     * Get the playlists for the course.
     */
    public function playlists()
    {
        return $this->belongsTo(playliste::class , 'playliste_id');
    }
}
