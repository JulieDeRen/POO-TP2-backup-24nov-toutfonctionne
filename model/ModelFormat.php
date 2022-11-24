<?php

class ModelFormat extends Crud {

    protected $table = 'format';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'description'];

}

?>