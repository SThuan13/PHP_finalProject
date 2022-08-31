<?php
require_once('app/controllers/Web/WebController.php');
require_once('app/Models/Contact.php');


class ContactController extends WebController
{

    protected $contact;

    public function __construct()
    {
        $this->contact = new Contact();
    }
    public function index()
    {
        return $this->view('contact/index.php');
    }



    public function create()
    {
        $this->contact->create($_POST);
        return redirect('homepage/index');
    }
}
