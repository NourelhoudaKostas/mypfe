<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'Username',
        'Module_id',
        'specialite_id',
        'cin',
        'telephone',
         'email'
    ];

    /**
     * Get the user associated with the Formateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function playlists()
    {
        return $this->hasMany(Playliste::class);
    }
}
