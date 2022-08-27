<?php

require_once('app/Models/Model.php');

class Contact extends Model
{
    protected $table = "contact";
    protected $id = "contact_id";

    protected $fillable = ['contact_id','name','email','subject'];
}