<?php
namespace App\Controllers;
use App\Providers\View;
use App\Models\Voiture;

class VoitureController{
  public function index(){
    $voiture = new Voiture();
    $voitures = $voiture->select();
    
    return View::render('voiture/index', ['voitures'=>$voitures]);
    
  }
}

?>