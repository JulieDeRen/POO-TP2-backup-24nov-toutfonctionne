<?php

class ModelCondition extends Crud {

    protected $table = 'condition';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'description'];

}

?>