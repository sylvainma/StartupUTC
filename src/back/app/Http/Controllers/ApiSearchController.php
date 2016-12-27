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

  public function search2(Request $request)
  {
    // Making sure the user entered a keyword.
    if($request->has('q')) {

        $s = Startup::search($request->get('q'))->get();

        if($request->has('departments')) {
            $s = $s->whereIn('department_id', $request->input('departments'));
        }

        if($request->has('fields')) {
            $s = $s->whereIn('field_id', $request->input('fields'));
        }

        if($request->has('foundation')) {
          $start = new \Carbon\Carbon($request->input('foundation')[0]);
          $end = new \Carbon\Carbon($request->input('foundation')[1]);
          $s = $s->where('foundation_date', '>=', $start)->where('foundation_date', '<=', $end);
        }

        $s = $s->all();
        return response()->success($s);
    }
    else return response()->error('Arguments de recherche non fournis', 422);
  }
}
