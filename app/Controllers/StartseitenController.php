<?php

namespace App\Controllers;
use App\Models\Startseite;

class StartseitenController extends BaseController
{




    public function getStartseite()
    {
        $db = db_connect();

        $firstmodel = new Startseite();
        $data['tasks'] = $firstmodel->getTasks();


        echo view('templates/head');


        echo view('startseite', $data);


        echo view('templates/footer');

    }


}


