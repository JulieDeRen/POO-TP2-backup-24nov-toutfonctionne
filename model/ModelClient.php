<?php

class ModelClient extends Crud {
    // *** IMPORTANT bons noms de variables ***
    protected $table = 'client';
    protected $tableForeignCountry = 'country';
    protected $primaryKey = 'id';
    protected $foreignKeyCountry = 'idCountry';

    protected $fillable = ['id', 'firstName', 'lastName', 'addresse', 'birthday', 'password', 'email', 'idCountry', 'countryName'];

    public function insertClient($data){
        $data_keys = array_fill_keys($this->fillable, '');
        $data_map = array_intersect_key($data, $data_keys);
        $nomChamp = implode(", ",array_keys($data_map));
        $valeurChamp = ":".implode(", :", array_keys($data_map));
        $sql = "INSERT INTO `$this->table` ($nomChamp) VALUES ($valeurChamp)";
        $stmt = $this->prepare($sql);
        foreach($data_map as $key=>$value){
            $stmt->bindValue(":$key", $value);
        } 
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        }else{
            return $this->lastInsertId();
        }
    }

    public function selectClient($champ='id', $order='ASC' ){
        // La requête sql ne fonctionne pas pour la table condition s'il n'y a pas l'échappé
        $sql = "SELECT * FROM `client` LEFT JOIN `country` ON client.idCountry = country.idCountry ORDER BY $champ $order"; 
        //print_r($sql);
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    }
    
}

?>