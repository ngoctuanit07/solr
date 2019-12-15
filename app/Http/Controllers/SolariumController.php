<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolariumController extends Controller
{
    //
    protected $client;

    public function __construct(\Solarium\Client $client)
    {
        $this->client = $client;
    }

    public function ping()
    {
      //  die('19');
        // create a ping query
        $ping = $this->client->createPing();
       // print_r($ping); die;

        // execute the ping query
        try {
            $this->client->ping($ping);
            return response()->json('OK');
        } catch (\Solarium\Exception $e) {
            return response()->json('ERROR', 500);
        }
    }
}
