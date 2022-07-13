<?php 
  require_once('app/Controllers/Admin/BackendController.php');

  class DashboardController extends BackendController
  {
    public function index()
    {
      //echo 'This is a DashboardController';
      return $this->view('dashboard/index.php');
    }


  }
?>