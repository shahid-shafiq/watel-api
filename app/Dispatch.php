<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
  protected $table = "dispatch";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dispatchcode', 'date', 'van_id', 'count', 'worth',
    ];
}
