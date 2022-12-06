<?php

class ModelCountry extends Crud {

    protected $table = 'country';
    protected $primaryKey = 'idCountry';
    protected $fillable = ['idCountry', 'countryName'];

    // nom de id différent
    /*public function selectCountry($champ='idCountry', $order='ASC' ){
        $sql = "SELECT * FROM `$this->table` ORDER BY $champ $order";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    }*/

}

?>