<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Startup;
use Validator;

class ApiStartupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $s = Startup::all();
      return response()->success($s);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), Startup::$rules);

      if ($validator->fails())
            return response()->error('Mauvais inputs', 422, $validator->errors());

      $s = new Startup();
      $s->name = $request->input('name');

      try {
        $s->save();
      } catch(\Exception $e) {
        return response()->error('Impossible de sauver la ressource', 500);
      }

      return response()->success($s);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $s = Startup::findOrFail($id);
      return response()->success($s);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $s = Startup::findOrFail($id);
      $validator = Validator::make($request->all(), Startup::$rules);

      if ($validator->fails())
            return response()->error('Mauvais inputs', 422, $validator->errors());

      $s->name = $request->input('name');

      try {
        $s->save();
      } catch(\Exception $e) {
        return response()->error('Impossible de sauver la ressource', 500);
      }

      return response()->success($s);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $s = Startup::findOrFail($id);

      try {
        $s->delete();
      } catch(\Exception $e) {
        return response()->error('Impossible de supprimer la ressource', 500);
      }

      return response()->success();
    }
}
