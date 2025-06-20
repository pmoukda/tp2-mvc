<?php
namespace App\Controllers;
use App\Models\Client;
use App\Providers\View;


class ClientController{
    public function index(){
        $client = new Client;
        $clients = $client->select();

        return View::render('client/index', ['clients'=>$clients]);
    }
    
    }
  
?>