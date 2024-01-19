<?php

namespace App\Controllers;

use App\Models\BoardsModel;
use App\Models\PersonenModel;
use App\Models\SpaltenModel;
use App\Models\TaskArtModel;
use App\Models\TaskModel;

class Spalten extends BaseController
{

    public function getSpaltenseite()
    {


        $spalten = new SpaltenModel();
        $data['spalten'] = $spalten->getSpalten();

        echo view('templates/head');
        echo view('spalten', $data);
        echo view('templates/footer');

    }



    public function getSpaltenCRUD($id = 0, $todo = 0){
        // Todo: 0 = Erstellen, 1 = Bearbeiten, 2 = Löschen

        $data['todo'] = $todo;
        $spalten = new SpaltenModel();

        if($id >0 && ($todo == 1 || $todo == 2))
        {

            $data['spalten'] = $spalten->getSpaltenWithoutBoard($id);

        }

        // Andere notwendige Daten für das Formular

        $boardmodel = new BoardsModel();
        $data['boards'] = $boardmodel->getBoards();





        echo view('templates/head');
        echo view('spaltenedit', $data);
        echo view('templates/footer');



    }
    public function postCRUD(){

        $spaltenmodel = new SpaltenModel();
        $result = $this->request->getPost('buttonCRUD');
        $id = $this->request->getPost('id');





        if($result == "Bearbeiten")
        {

            if(isset($_POST['id']) && $_POST['id'] != ''){
                $spaltenmodel->spalten_bearbeiten();
            }
        }elseif ($result == "Speichern") {
            $spaltenmodel->spalten_speichern();
        }
        elseif ($result == "Löschen") {
            if (isset($_POST['id']) && $_POST['id'] != '') {
                $spaltenmodel->spalten_loeschen();
            }
        }







        return redirect()->to(base_url('Spalten/Spaltenseite'));
    }












}