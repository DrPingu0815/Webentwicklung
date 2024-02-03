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
        echo view('templates/menu');
        echo view('spalten', $data);
        echo view('templates/footer');

    }



    public function getSpaltenCRUD($id = 0, $todo = 0){
        // Todo: 0 = Erstellen, 1 = Bearbeiten, 2 = Löschen

        $data['todo'] = $todo;
        $spalten = new SpaltenModel();

        if($id >0 && ($todo == 1 || $todo == 2))
        {

            $data['spalten'] = $spalten->getSpalten($id);

        }

        // Andere notwendige Daten für das Formular

        $boardmodel = new BoardsModel();
        $data['boards'] = $boardmodel->getBoards();





        echo view('templates/head');
        echo view('templates/menu');
        echo view('spaltenedit', $data);
        echo view('templates/footer');


        $this->session->set('data',$data);
       // var_dump($this->session->get('data'));
    }
    public function postCRUD(){

        $spaltenmodel = new SpaltenModel();
        $result = $this->request->getPost('buttonCRUD');
        $id = $this->request->getPost('id');

        if($this->validation->run($_POST, "spaltenbearbeiten")) {


            if ($result == "Bearbeiten") {

                if (isset($_POST['id']) && $_POST['id'] != '') {
                    $spaltenmodel->spalten_bearbeiten();
                }
            } elseif ($result == "Speichern") {
                $spaltenmodel->spalten_speichern();
            } elseif ($result == "Löschen") {
                if (isset($_POST['id']) && $_POST['id'] != '') {
                    $spaltenmodel->spalten_loeschen();
                }
            }


            return redirect()->to(base_url('Spalten/Spaltenseite'));
        }else{

            // Ruft die Infromation Sitzung wieder auf.

            $data = $this->session->get('data');
            $data['spalten'] = $_POST;


            //$data=array_merge($_POST,$data['tasks']);

            $data['error'] = $this->validation->getErrors();

            //var_dump($data);
            // var_dump($data['error']);


            echo view('templates/head');
            echo view('templates/menu');
            echo view('spaltenedit', $data);
            echo view('templates/footer');


        }



    }












}