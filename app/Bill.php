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
        'no', 'date', 'delivery_id', 'count', 'cost', 
        'discount', 'amount', 'payment', 'status'
    ];

    public function Invoice() {
      return $this->belongsTo('App\Invoice');
    }

    public function delivery() {
      return $this->belongsTo('App\Delivery');
    }
}
