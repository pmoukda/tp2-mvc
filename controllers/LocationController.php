<?php
namespace App\Controllers;
use App\Models\Location;
use App\Models\Client;
use App\Models\Voiture;
use App\Providers\View;
use App\Providers\Validator;


class LocationController{
    public function index(){
        $location = new Location;
        $reservation = $location->select();
        
        return View::render('location/index', ['location'=>$reservation]);
    }
    
    public function view($data){
        if(isset($data['id']) && $data['id'] != null){
            $location = new Location;
            $selectId = $location->selectId($data['id']);
            
            if($selectId){
                $voiture_id = $selectId['voiture_id'];
                $voiture = new Voiture;
                $selectedVoiture = $voiture->selectId($voiture_id);
                
                $client_id = $selectId['client_id'];
                $client = new Client;
                $selectedClient = $client->selectId($client_id);
                
                return View::render('location/view', ['location'=>$selectId, 'voiture' => $selectedVoiture, 'client' => $selectedClient ]);
            }else{
                return View::render('error', ['message'=>' No car found!']);
            }
        }else{
            return View::render('error', ['message'=>'404 not found!']);
        }
    }
    
    
    public function create() {
        
        $voiture = new Voiture;
        $selectedVoiture = $voiture->selectId($_GET['id']);
        
        return View::render('location/create', [
            'voiture' => $selectedVoiture
        ]);
    }
    
    
    public function store($data){
        $validator = new Validator;
        
        // Validation
        $validator->field('dateDebut', $data['dateDebut'])->validateDate('Y-m-d')->required();
        $validator->field('dateFin', $data['dateFin'])->validateDate('Y-m-d')->required();
        $validator->field('statut',$data['statut'])->required();
        // validation client
        $validator->field('nom', $data['nom'])->min(2)->max(20);
        $validator->field('adresse', $data['adresse'])->max(50);
        $validator->field('codePostal', $data['codePostal'])->max(7);
        $validator->field('phone', $data['phone'])->max(20)->number();
        $validator->field('email', $data['email'])->email()->required();
        $validator->field('permis_conduire', $data['permis_conduire'])->max(14)->required();
        $validator->field('voiture_id', $data['voiture_id'])->required();
        
        if ($validator->isSuccess()) {
            // Recalcul du montant côté serveur
            $voiture = new Voiture;
            $voitures = $voiture->selectId($data['voiture_id']);
            
            $prixJournalier = $voitures['prixJournalier'];
            $dateDebut = new \DateTime($data['dateDebut']);
            $dateFin = new \DateTime($data['dateFin']);
            $nbJours = $dateDebut->diff($dateFin)->days + 1;
            $montant = $nbJours * $prixJournalier;
            
            $data['montant'] = $montant;
            
            // Insertion (Client + Location)
            $client = new Client;
            $clientId = $client->insert($data);
            
            $data['client_id'] = $clientId;
            
            $location = new Location;
            $locationId = $location->insert($data);
            
            return View::redirect('location/view?id=' . $locationId);
        } else {
            // Erreurs à renvoyer à la vue
            $errors = $validator->getErrors();
            $voiture = new Voiture;
            $voitures = $voiture->selectId($data['voiture_id']);
            
            return View::render('location/create', ['errors' => $errors,'location' => $data,'voiture' => $voiture]);
        }
    }
    
    
    public function edit($data){
        if(isset($data['id']) && $data['id'] != null){
            
            $location = new Location;
            $selectId = $location->selectId($data['id']);
            
            $voiture_id = $selectId['voiture_id'];
            $voiture = new Voiture;
            $voitures = $voiture->selectId($voiture_id);
            
            $client_id = $selectId['client_id'];
            $client = new Client;
            $clients = $client->selectId($client_id);
            
            if($selectId){
                return View::render('location/edit', ['location'=>$selectId, 'voiture'=>$voitures, 'client'=>$clients ]);
            }else{
                return View::render('error', ['message'=>'No informations of this reservation are found!']);
            }
        }else{
            return View::render('error', ['message'=>'404 not found!']);
        }
    }
    
    
    public function update($data, $get){
        if (isset($get['id']) && $get['id'] != null) {
            
            $validator = new Validator;
            // Validation location
            $validator->field('dateDebut', $data['dateDebut'])->validateDate('Y-m-d')->required();
            $validator->field('dateFin', $data['dateFin'])->validateDate('Y-m-d')->required();
            $validator->field('voiture_id', $data['voiture_id'])->required();
            $validator->field('statut', $data['statut'])->required();
            
            // Validation client
            $validator->field('nom', $data['nom'])->min(2)->max(20);
            $validator->field('adresse', $data['adresse'])->max(50);
            $validator->field('codePostal', $data['codePostal'])->max(7);
            $validator->field('phone', $data['phone'])->max(20)->number();
            $validator->field('email', $data['email'])->email()->required();
            $validator->field('permis_conduire', $data['permis_conduire'])->max(14)->required();
            
            if ($validator->isSuccess()) {
                
                $voiture = new Voiture;
                $voitures = $voiture->selectId($data['voiture_id']);
                
                $prixJournalier = $voitures['prixJournalier'];
                $dateDebut = new \DateTime($data['dateDebut']);
                $dateFin = new \DateTime($data['dateFin']);
                $nbJours = $dateDebut->diff($dateFin)->days + 1;
                $montant = $nbJours * $prixJournalier;
                
                $data['montant'] = $montant;
                
                $location = new Location;
                $locationUpdate = $location->update($data, $get['id']);
                
                $client = new Client;
                $clientUpdate = $client->update($data, $data['client_id']);
                
                if ($locationUpdate && $clientUpdate) {
                    return View::redirect('location');
                } else {
                    return View::render('error', ['message' => 'Impossible de mettre à jour les données']);
                }
            } else {
                $errors = $validator->getErrors();
                
                $voiture = (new Voiture())->selectId($data['voiture_id']);
                $client = (new Client())->selectId($data['client_id']);
                
                return View::render('location/edit', ['errors' => $errors,'location' => $data,'voiture' => $voiture,'client' => $client]);
            }
        }
    }
    
    
    public function delete($data){
        
        $location= new Location;
        $delete = $location->delete($data['id']);
        if($delete){
            return View::redirect('location');
        }else{
            return View::render('error', ['message'=>'Impossible to delete! This reservation does not exist.']);
        }
    }
}

?>