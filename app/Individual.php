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
   * Règles pour Validator
   *
   * @var array
   */
  public static $rules = [
    'first_name' => 'required|string',
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [];

  /**
   * Attributs cachés
   *
   * @var array
   */
  protected $hidden = ['pivot'];

  /**
   * Attributs rajoutés
   *
   * @var array
   */
  protected $appends = [];

  /**
   * Retourne les Startup associées au Founder
   *
   */
  public function startups()
  {
    return $this->belongsToMany('App\Startup');
  }

}
