<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\ApiBaseController;

class ApiIndividualsController extends ApiBaseController
{
  /*
   *  Contructeur: passe le nom du modèle pour établir le CRUD
   */
  public function __construct()
  {
     parent::__construct('App\Individual');
  }
}
