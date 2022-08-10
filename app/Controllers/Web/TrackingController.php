<?php
require_once('app/controllers/Web/WebController.php');

class TrackingController extends WebController
{
    public function index()
    {
        return $this->view('tracking/index.php');
    }
}