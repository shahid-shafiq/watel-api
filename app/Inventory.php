<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
  protected $table = "inventory";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'trans', 'batch', 'count', 'amount'
    ];
}
