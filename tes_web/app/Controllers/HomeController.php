<?php

namespace App\Controllers;

class HomeController extends Controller
{

    public function index()
    {
        return $this->view("layout");
    }

    public function change_photo()
    {
        return $this->view("change_photo");
    }
}
