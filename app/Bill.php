<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no', 'date', 'client_id', 'count', 'cost', 'discount', 'amount', 'payment'
    ];
}
