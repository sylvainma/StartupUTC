<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Founder extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'founders';

  /**
   * Retourne le Founder
   *
   */
  public function individual()
  {
    return $this->belongsTo('App\Individual');
  }

  /**
   * Retourne la Startup
   *
   */
  public function startup()
  {
    return $this->belongsTo('App\Startup');
  }

}
