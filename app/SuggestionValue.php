<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuggestionValue extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'suggestions_values';

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
      'table' => 'required|string',
      'row' => 'required|integer',
      'column' => 'required|string',
      'new_value' => 'required|string'
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
