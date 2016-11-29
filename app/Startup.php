<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'startups';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name'];

  /**
   * Retourne tous les Founder de la Startup
   *
   */
  public function individuals()
  {
    return $this->belongsToMany('App\Individual', 'founders');
  }

}
