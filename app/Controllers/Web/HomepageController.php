<?php

require_once('app/Controllers/Web/WebController.php');

class HomepageController extends WebController
{
    public function index()
    {
        return $this->view('homepage/index.php');
    }
}
