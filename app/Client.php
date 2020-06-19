<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
  use Notifiable;
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'address', 'street', 'area_id', 'city_id', 'mobile', 'email', 'demand'
  ];

  public function area() {
    return $this->belongsTo('App\Area');
  }

  public function city() {
    return $this->belongsTo('App\City');
  }
}
