<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiBaseController;
use Illuminate\Http\Request;
use App\Http\Requests;

class ApiFoundersController extends ApiBaseController
{
  public function __construct()
  {
     parent::__construct('App\Individual');
  }
}
