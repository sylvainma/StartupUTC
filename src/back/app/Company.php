<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'companies';

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
    'name' => 'required|string'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
  ];

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
