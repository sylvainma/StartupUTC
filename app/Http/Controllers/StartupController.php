<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Startup;

class StartupController extends Controller
{
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request, Startup $startup)
  {
    return view('startup', ['s' => $startup]);
  }
}
