<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Startup;
use App\Field;
use App\Department;
use App\LegalStatus;
use Validator;
use Schema;
use App\Suggestion;
use App\SuggestionValue;

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
    return view('startups.show', [
      's' => $startup,
      'infos' => $startup->field || $startup->twitter || $startup->facebook || $startup->linkedin || $startup->url,
      'network' => count($startup->individuals()->get()->all()) > 0,
    ]);
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
    $rules = [
      'editor_email' => 'required|email'
    ];
    $validator = Validator::make($request->all(), array_merge($rules, Startup::$rules))->validate();

    try {
      $s = new Suggestion();
      $s->email = $request->input('editor_email');
      $s->save();

      $cols = Schema::getColumnListing($startup->getTable());
      $cols = array_diff($cols, ['id', 'slug', 'created_at', 'updated_at']);

      foreach($cols as $col)
      {
        if($request->input($col)) {
          $v = new SuggestionValue();
          $v->table = 'startups';
          $v->row = $startup->id;
          $v->column = $col;
          $v->new_value = $request->input($col);
          $s->values()->save($v);
        }
      }
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['Une erreur interne est survenue, veuillez réessayer plus tard.'])->withInput();
    }

    return redirect()->route('startups.show', ['startup' => $startup])->with('status', true);
  }
}
