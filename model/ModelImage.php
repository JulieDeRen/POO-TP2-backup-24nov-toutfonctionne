<?php

class ModelImage extends Crud {
    // *** IMPORTANT bons noms de variables ***
    protected $table = 'image';
    protected $primaryKey = 'id';
    protected $foreignKey = 'idStamp';

    protected $fillable = ['id', 'imgPath', 'idStamp'];
    
}

?>