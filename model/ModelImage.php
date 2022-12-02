<?php

class ModelImage extends Crud {
    // *** IMPORTANT bons noms de variables ***
    protected $table = 'image';
    protected $primaryKey = 'id';
    protected $foreignKey = 'idStamp';

    protected $fillable = ['id', 'imgPath', 'idStamp'];

    public function insertImage($data){
        // Pas nécessaire de traiter données manquantes puisque toutes requises dans la table

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
    
}

?>