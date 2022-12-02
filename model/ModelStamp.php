<?php

class ModelStamp extends Crud {
    // *** IMPORTANT bons noms de variables ***
    protected $table = 'stamp';
    protected $primaryKey = 'id';
    protected $foreignKeyCountry = 'idCountry';
    protected $foreignKeyFormat = 'idFormat';
    protected $foreignKeyCondition = 'idCondition';

    protected $fillable = ['id', 'name', 'price', 'priceEstimation', 'date', 'description', 'idCountry', 'idFormat', 'idCondition'];

    public function insertStamp($data){
        // traiter les données non obligatoires qui posent problème si elle ne sont pas saisie dans la requête
        foreach($data as $key => $value){
            if(isset($data[$key]) && ($value=="" || $value=="-1")){
                unset($data[$key]);
            }
        }
        $data_keys = array_fill_keys($this->fillable, '');
        $data_map = array_intersect_key($data, $data_keys);
        $nomChamp = implode(", ",array_keys($data_map));
        $valeurChamp = ":".implode(", :", array_keys($data_map));
        $sql = "INSERT INTO stamp ($nomChamp) VALUES ($valeurChamp)";
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
    // problème pour moi avec les 
    public function selectStamp($champ='id', $order='ASC' ){
        // La requête sql ne fonctionne pas pour la table condition s'il n'y a pas l'échappé
        $sql = "SELECT `stamp`.id, `stamp`.name as `stampName`, `stamp`.price, `stamp`.priceEstimation, `stamp`.date, `stamp`.description, `stamp`.idCountry, `stamp`.idFormat, `stamp`.idCondition, `country`.countryName, `format`.name as `formatName`, `condition`.name as `conditionName` FROM `stamp` LEFT JOIN `country` on stamp.idCountry = country.idCountry LEFT JOIN `format`on stamp.idFormat = format.id LEFT JOIN `condition` on stamp.idCondition = `condition`.id ORDER BY $champ $order"; 
        // $sql = "SELECT `stamp`.id, `stamp`.name as `stampName`, `stamp`.price, `stamp`.priceEstimation, `stamp`.date, `stamp`.description, `stamp`.idCountry, `stamp`.idFormat, `stamp`.idCondition, `country`.countryName, `format`.name as `formatName`, `condition`.name as `conditionName`, `image`.imgPath as `stampImgFile` FROM `stamp` LEFT JOIN `country` on stamp.idCountry = country.idCountry LEFT JOIN `format`on stamp.idFormat = format.id LEFT JOIN `condition` on stamp.idCondition = `condition`.id RIGHT JOIN `image` on `image`.idStamp = `stamp`.id  ORDER BY $champ $order"; 
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    }
    
}

?>