<?php

namespace App\Controllers;

class Neuercontroller extends BaseController
{
    public function getindex(): string
    {
        echo view('templates/header');
        return view('templates/footer');
        //return view('welcome_message');
    }

    public function viewGruppennummer(): int
    {
        //var_dump();
        return 17;
    }
}
