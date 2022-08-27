<?php

require_once('app/Controllers/Web/Webcontroller.php');

class SingleController extends WebController
{
    public function index()
    {
        return $this->view('single/index.php');
    }
}