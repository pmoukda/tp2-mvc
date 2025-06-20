<?php
namespace App\Models;
abstract  class CRUD extends \PDO{
    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=locationvoiture;port=3306;charset=utf8', 'root', '');
    } 
    // Fonction select
    final public function select($field = null, $order = 'ASC'){
        if ($field == null) {
            $field = $this->primaryKey;  
        }
        
        $sql = "SELECT * FROM $this->table order by $field $order";
        if($stmt = $this->query($sql)){
            
            return $stmt->fetchAll();
        }else{
            return false;
        }
        
    }
    
    // Fonction sélectionner des données par id
    final  public function selectId($value){
        
        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if ($count == 1) {
            return $stmt->fetch();
        }else{
            return false;
        }
    }
    
    //     // Fonction insérer les données
    
    final public function insert($data){
        
        $data_keys = array_fill_keys($this->fillable, '');
        $data = array_intersect_key($data, $data_keys);
        
        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":".implode(', :', array_keys($data));
        $sql = "INSERT INTO $this->table ($fieldName) VALUES ($fieldValue);";
        
        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        if($stmt->execute()){
            return $this->lastInsertId();
        }else{
            return false;
        } 
    }
    
    
    // Fonction mettre à jour les donnés par id 
    final public function update($data, $id){
        $data_keys = array_fill_keys($this->fillable, '');
        $data = array_intersect_key($data, $data_keys);
        
        $fieldName = null;
        foreach($data as $key=>$value){
            $fieldName .= "$key = :$key, ";
        }
        $fieldName = rtrim($fieldName, ', ');
        $sql = "UPDATE $this->table SET $fieldName WHERE $this->primaryKey = :$this->primaryKey";
        // return $sql;
        $data[$this->primaryKey] = $id;
        
        //    print_r($data);
        //    die();
        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    
    // Fonction Supprimer données par id
    final public function delete($value){
        
        $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }  
    } 
}


?> 