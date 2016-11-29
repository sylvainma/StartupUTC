<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'individuals';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['first_name', 'last_name'];

  /**
   * Retourne les Startup associées au Founder
   *
   */
  public function startups()
  {
    return $this->belongsToMany('App\Startup', 'founders');
  }

}
