<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
class TestController extends Controller
{
    //
    protected $client;

    public function __construct(\Solarium\Client $client)
    {
      //  print_r($client); die;
        $this->client = $client;
    }

    public function ping()
    {
        // create a ping query
        $ping = $this->client->createPing();
        $update = $this->client->createUpdate();
        $doc = $update->createDocument();
        $doc->id = 123;
        $doc->title = 'Some Movie';
        $doc->cast = array('Sylvester Stallone', 'Marylin Monroe', 'Macauley Culkin');
        $update->addDocument($doc);
        $update->addCommit();

        // execute the ping query
        try {
            $this->client->update($update);
            //die('')
            //$this->client->ping($ping);
            return response()->json('OK');
        } catch (\Solarium\Exception $e) {
            return response()->json('ERROR', 500);
        }
    }
}
