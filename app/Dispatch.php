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
        'dispatchcode', 'date', 'van_id', 'count',
        'worth', 'status'
    ];

    public function van() {
      return $this->belongsTo('App\Van');
    }

    public function delivery() {
      return $this->hasMany('App\Delivery');
    }
}
