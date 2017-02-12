<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Cviebrock\EloquentSluggable\Sluggable;

class Startup extends Model
{

  use Searchable;
  use Sluggable;

  /**
   * Return the sluggable configuration array for this model.
   *
   * @return array
   */
  public function sluggable()
  {
      return [
          'slug' => [
              'source' => 'name_official'
          ]
      ];
  }

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
  protected $fillable = ['name_official'];

  /**
   * Règles pour Validator
   *
   * @var array
   */
  public static $rules = [
      'name_official' => 'required|string'
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
  protected $hidden = ['address_id', 'department_id', 'field_id', 'legal_status_id'];

  /**
   * Attributs rajoutés
   *
   * @var array
   */
  protected $appends = ['individuals', 'keywords', 'address', 'department', 'field', 'legal_status'];

  /**
   * Get the route key for the model.
   *
   * @return string
   */
  public function getRouteKeyName()
  {
      return 'slug';
  }

  /**
   * Retourne tous les Founder de la Startup
   *
   */
  public function individuals()
  {
    return $this->belongsToMany('App\Individual')->withPivot('job_title');
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
   * Retourne le département
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
    return $this->address()->first();
  }

  /**
   * Retourne le Department de la Startup
   *
   */
  public function getDepartmentAttribute()
  {
    return $this->department()->first();
  }


  /**
   * Retourne le Field de la Startup
   *
   */
  public function getFieldAttribute()
  {
    return $this->field()->first();
  }

  /**
   * Retourne le LegalStatus de la Startup
   *
   */
  public function getLegalStatusAttribute()
  {
    return $this->legal_status()->first();
  }

}
