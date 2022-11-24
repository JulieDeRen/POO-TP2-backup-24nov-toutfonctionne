<?php

class ModelCountry extends Crud {

    protected $table = 'country';
    protected $primaryKey = 'idCountry';
    protected $fillable = ['idCountry', 'countryName'];

}

?>