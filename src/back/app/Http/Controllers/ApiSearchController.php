<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Startup;

class ApiSearchController extends Controller
{
  public function search(Request $request)
  {
    // Making sure the user entered a keyword.
    if($request->has('q')) {

        // Using the Laravel Scout syntax to search the products table.
        $s = Startup::search($request->get('q'))->get();

        // If there are results return them, if none, return the error message.
        return response()->success($s);

    }
    else return response()->error('Arguments de recherche non fournis', 422);
  }
}
