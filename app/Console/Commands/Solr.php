<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use App\User;
use Solarium\Client;
class Solr extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $client = new Client(Config::get('solr'));
      //  print_r($client); die;
        $userModels = User::get();
        foreach ($userModels as $user){
            $update = $client->createUpdate();
            $doc = $update->createDocument();
            $doc->id = $user->id;
            $doc->name = $user->name;
            $doc->email = $user->email;//array('Sylvester Stallone', 'Marylin Monroe', 'Macauley Culkin');
            $update->addDocument($doc);
            $update->addCommit();
            // execute the ping query
            try {
                $client->update($update);
              //  return "ok";
            } catch (\Solarium\Exception $e) {
                return response()->json('ERROR', 500);
            }
        }
    }
}
