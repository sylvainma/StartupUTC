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
   * Règles pour Validator
   *
   * @var array
   */
  public static $rules = [
              'name' => 'required|string',
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
  protected $hidden = ['address_id', 'company_id', 'department_id', 'field_id', 'legal_status_id'];

  /**
   * Attributs rajoutés
   *
   * @var array
   */
  protected $appends = ['individuals', 'keywords', 'address', 'company', 'department', 'field', 'legal_status'];

  /**
   * Retourne tous les Founder de la Startup
   *
   */
  public function individuals()
  {
    return $this->belongsToMany('App\Individual');
  }

  /**
   * Retourne tous les Keyword de la Startup
   *
   */
  public function keywords()
  {
    return $this->belongsToMany('App\Keyword');
  }

  /**
   * Retourne l'Address de la Startup
   *
   */
  public function address()
  {
    return $this->belongsTo('App\Address');
  }

  /**
   * Retourne la Company de la Startup
   *
   */
  public function company()
  {
    return $this->belongsTo('App\Company');
  }

  /**
   * Retourne le Department de la Startup
   *
   */
  public function department()
  {
    return $this->belongsTo('App\Department');
  }

  /**
   * Retourne le Field de la Startup
   *
   */
  public function field()
  {
    return $this->belongsTo('App\Field');
  }

  /**
   * Retourne le LegalStatus de la Startup
   *
   */
  public function legal_status()
  {
    return $this->belongsTo('App\LegalStatus');
  }

  /**
   * Retourne tous les Founder de la Startup
   *
   */
  public function getIndividualsAttribute()
  {
    return $this->individuals()->get();
  }

  /**
   * Retourne tous les Keyword de la Startup
   *
   */
  public function getkeywordsAttribute()
  {
    return $this->keywords()->get();
  }

  /**
   * Retourne l'Address de la Startup
   *
   */
  public function getAddressAttribute()
  {
    return $this->address()->get();
  }

  /**
   * Retourne la Company de la Startup
   *
   */
  public function getCompanyAttribute()
  {
    return $this->company()->get();
  }

  /**
   * Retourne le Department de la Startup
   *
   */
  public function getDepartmentAttribute()
  {
    return $this->department()->get();
  }

  /**
   * Retourne le Field de la Startup
   *
   */
  public function getFieldAttribute()
  {
    return $this->field()->get();
  }

  /**
   * Retourne le LegalStatus de la Startup
   *
   */
  public function getLegalStatusAttribute()
  {
    return $this->legal_status()->get();
  }

}
