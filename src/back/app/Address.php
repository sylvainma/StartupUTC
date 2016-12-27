<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'addresses';

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
    'address' => 'required|string',
    'city' => 'required|string',
    'cp' => 'required|integer',
    'country' => 'required|string',
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
  protected $appends = ['full_address'];

  /**
   * Retourne l'Address complète
   *
   */
  public function getFullAddressAttribute()
  {
    return $this->address . "\n" . $this->city . ", " . $this->cp . "\n" . $this->country;  
  }

}
