<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    // This connects the model to your manual table
    protected $table = 'videos';

    // This UNLOCKS the columns so Laravel can insert data
    protected $fillable = [
        'title',
        'file_path',
        'description'
    ];
}