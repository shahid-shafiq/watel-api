<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Van extends Model
{
    //
    protected $fillable = [
        'title', 'description', 'licenseplate', 'capacity', 
        'drivername', 'drivermobile', 'loadername', 'loadermobile', 'helpername', 'helpermobile'
    ];
}
