<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        //echo view('templates/header');
        //return view('templates/footer');
        return view('welcome_message');
    }
}
