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

        if($request->has('departments') && count($request->input('departments')) > 0) {
            $s = $s->whereIn('department_id', $request->input('departments'));
        }

        if($request->has('fields') && count($request->input('fields')) > 0) {
            $s = $s->whereIn('field_id', $request->input('fields'));
        }

        if($request->has('foundation')) {
          $start = \Carbon\Carbon::parse('first day of January '.$request->input('foundation')[0], 'Europe/Paris');
          $end = \Carbon\Carbon::parse('first day of January '.$request->input('foundation')[1], 'Europe/Paris');

          if($start->diffInYears($end) >= 0) {

            $s = $s->filter(function ($startup, $key) use ($start, $end) {

              // Si la date de foundation est NULL on le prend quand même
              if(!$startup->foundation_date) return true;

              // Sinon, on check si la date de fondation est dans l'intervalle
              $date = new \Carbon\Carbon($startup->foundation_date);
              return ($date->year >= $start->year) && ($date->year <= $end->year);

            });

          }
        }

        $s = $s->all();
        return response()->success($s);
    }
    else return response()->error('Arguments de recherche non fournis', 422);
  }
}
