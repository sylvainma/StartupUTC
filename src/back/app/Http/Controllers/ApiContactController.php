<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Mail;
use App\Mail\Contact;

class ApiContactController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function contact(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|string',
      'email' => 'required|email',
      'body' => 'required|string|min:1',
    ]);

    if ($validator->fails())
      return response()->error('Mauvais inputs', 422, $validator->errors());

    $contact = new Contact($request->input('name'), $request->input('email'), $request->input('body'));
    Mail::to(env('MAIL_USERNAME'))->send($contact);

    return response()->success();
  }
}
