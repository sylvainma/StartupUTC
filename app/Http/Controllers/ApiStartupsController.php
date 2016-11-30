<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\ApiBaseController;

use App\Http\Controllers\ApiAddressController;
use App\Http\Controllers\ApiCompanyController;

use App\Address;
use App\Startup;
use App\Company;
use App\Keyword;

class ApiStartupsController extends ApiBaseController
{
  /*
   * Contructeur: passe le nom du modèle pour établir le CRUD
   */
  public function __construct()
  {
    parent::__construct('App\Startup');
  }

  /**
   * Ajoute une Address
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function storeAddress(Request $request, $id)
   {
     $s = Startup::findOrFail($id);

     $controller = new ApiAddressController();
     if( ($res = $controller->store($request)) && $res->status() != 200)
      return $res;

     $a = Address::orderby('created_at', 'desc')->first();
     $s->address()->associate($a);
     $s->save();

     return response()->success();
   }

   /**
    * Modifie l'Address
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function updateAddress(Request $request, $id)
   {
     $s = Startup::findOrFail($id);
     $controller = new ApiAddressController();

     if(!$s->address)
      return $controller->update($request, -1);
     else
      return $controller->update($request, $s->address->id);
   }

   /**
    * Supprime l'Address
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroyAddress($id)
   {
    $s = Startup::findOrFail($id);
    $controller = new ApiAddressController();

    if(!$s->address)
      return $controller->destroy(-1);
    else
      return $controller->destroy($s->address->id);
   }

  /**
   * Ajoute une Company
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
  */
  public function storeCompany(Request $request, $id)
  {
    $s = Startup::findOrFail($id);

    $controller = new ApiCompanyController();
    if( ($res = $controller->store($request)) && $res->status() != 200)
     return $res;

    $c = Company::orderby('created_at', 'desc')->first();
    $s->company()->associate($c);
    $s->save();

    return response()->success();
  }

  /**
   * Modifie la Company
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function updateCompany(Request $request, $id)
  {
    $s = Startup::findOrFail($id);
    $controller = new ApiCompanyController();

    if(!$s->company)
     return $controller->update($request, -1);
    else
     return $controller->update($request, $s->company->id);
  }

  /**
   * Supprime la Company
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroyCompany($id)
  {
   $s = Startup::findOrFail($id);
   $controller = new ApiCompanyController();

   if(!$s->company)
     return $controller->destroy(-1);
   else
     return $controller->destroy($s->company->id);
  }

  /**
   * Ajoute un Keyword
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
  */
  public function storeKeyword(Request $request, $id)
  {
    $s = Startup::findOrFail($id);

    if($request->input('name') && $key = Keyword::where('name', $request->input('name'))->first())
    {
      // Dans le cas où le keyword existe déjà
      $s->keywords()->attach($key->id);
    }
    else
    {
      $controller = new ApiKeywordsController();
      if( ($res = $controller->store($request)) && $res->status() != 200)
       return $res;

      $c = Keyword::orderby('created_at', 'desc')->first();
      $s->keywords()->attach($c->id);
    }

    $s->save();
    return response()->success();
  }

  /**
   * Supprime un Keyword
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroyKeyword($id, $idk)
  {
   $s = Startup::findOrFail($id);
   $k = Keyword::findOrFail($idk);
   $controller = new ApiKeywordsController();

   if($s->keywords()->where('id', $idk)->first()) {
     $s->keywords()->detach($idk);
     return response()->success();
   }
   else
     return $controller->destroy(-1);
  }
}
