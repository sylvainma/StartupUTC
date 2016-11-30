<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'keywords';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [];

  /**
   * Règles pour Validator
   *
   * @var array
   */
  public static $rules = [
    'name' => 'required|string|regex:/^[^\s]+$/'
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
  protected $hidden = [];

  /**
   * Attributs rajoutés
   *
   * @var array
   */
  protected $appends = [];
}
