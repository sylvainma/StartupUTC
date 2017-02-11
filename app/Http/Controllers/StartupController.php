<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Startup;
use App\Field;
use App\Department;
use App\LegalStatus;
use Validator;

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
    return view('startups.show', ['s' => $startup]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Request $request, Startup $startup)
  {
    $fields = Field::all()->sortBy('name');
    $depts = Department::all();
    $legal_statuses = LegalStatus::all();
    return view('startups.edit', [
        's' => $startup,
        'fields' => $fields,
        'depts' => $depts,
        'legal_statuses' => $legal_statuses,
       ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Startup $startup)
  {
    $validator = Validator::make($request->all(), Startup::$rules)->validate();

  }
}
