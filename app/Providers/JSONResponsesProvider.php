<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class JSONResponsesProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      // Pour les succès en général
      Response::macro('success', function ($data = []) {
        $json = array("meta" => array("status" => 200, "message" => "OK"),
                      "data" => $data);
        return Response::json($json);
      });

      // Pour les erreurs en général
      Response::macro('error', function ($message, $status = 400, $data = []) {
        $json = array("meta" => array("status" => $status, "message" => $message, "data" => $data));
        return Response::json($json, $status);
      });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
