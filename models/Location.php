<?php
namespace App\Models;
use App\Models\CRUD;

class Location extends CRUD {
    protected $table = "location";
    protected $primaryKey = "id";
    protected $fillable = ['dateDebut','dateFin', 'montant', 'statut', 'client_id', 'voiture_id'];
    
}