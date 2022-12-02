<?php

class ModelBasket extends Crud {
    // *** IMPORTANT bons noms de variables ***
    protected $table = 'basket';
    // primaryKey pour le client pcq c'est principalement ce qu'on veut voir 
    protected $primaryKey = 'idClient';
    protected $primaryKeyStamp = 'idStamp';

    protected $fillable = ['idClient', 'idStamp', 'price', 'dateTransaction', 'datePutInBasket'];
    
}

?>