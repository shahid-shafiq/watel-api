<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
  protected $table = "delivery";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dispatch_id', 'client_id', 'count',
        'delivered'
    ];

    public function client() {
      return $this->belongsTo('App\Client');
    }

    public function dispatch() {
      return $this->belongsTo('App\Dispatch');
    }
}
