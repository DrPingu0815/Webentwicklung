<?php

namespace App\Controllers;

class StartseitenController extends BaseController
{

    public function getStartseite()
    {


        echo view('templates/head');
        echo view('startseite');
        echo view('templates/footer');

    }
}