<?php
namespace App\Models;
use App\Models\CRUD;


class Voiture extends CRUD {
    protected $table = "voiture";
    protected $primaryKey = "id";
    protected $fillable = ['marque', 'modele', 'annee',  'nombrePassager', 'couleur' , 'transmision' ,'prixJournalier'];
}

?>