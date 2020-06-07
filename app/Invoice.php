<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    ///**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'invoicecode', 'date', 'month', 'no', 
        'client_id', 'bill_id', 'count', 'amount'
    ];
}
