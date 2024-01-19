<?php

namespace App\Controllers;

use App\Models\BoardsModel;
use App\Models\PersonenModel;
use App\Models\SpaltenModel;
use App\Models\TaskArtModel;
use App\Models\TaskModel;




class Tasks extends BaseController
{




    public function getStartseite()
    {


        $tasks = new TaskModel();
        $data['tasks'] = $tasks->getTasks();

        echo view('templates/head');
        echo view('startseite', $data);
        echo view('templates/footer');

    }





    public function getTaskCRUD($id = 0, $todo = 0){
        // Todo: 0 = Erstellen, 1 = Bearbeiten, 2 = Löschen



         $data['todo'] = $todo;
         $taskModel = new TaskModel();

         if ($id > 0 && ($todo == 1 || $todo == 2)) {

             $data['tasks'] = $taskModel->getTasks($id);

         }


         // Andere notwendige Daten für das Formular
         $personenmodel = new PersonenModel();
         $data['personen'] = $personenmodel->getPersonen();

         $spaltenmodel = new SpaltenModel();
         $data['spalten'] = $spaltenmodel->getSpalten();

         $taskartenmodel = new TaskArtModel();
         $data['taskarten'] = $taskartenmodel->getTaskarten();

         echo view('templates/head');
         echo view('taskedit', $data);
         echo view('templates/footer');

    }











    public function postCRUD(){
        //$this->session = \Config\Services::session();
        //$this->valdiation = \Config\Services::validation();
        $validation = \Config\Services::validation();
        //echo $this->valdiation;


        var_dump($_POST);
        //die();
        $taskmodel = new TaskModel();
        $result = $this->request->getPost('buttonCRUD');
        $id = $this->request->getPost('id');


        if($validation->run($_POST, 'taskbearbeiten')) {

            if ($result == "Bearbeiten") {

                if (isset($_POST['id']) && $_POST['id'] != '') {
                    $taskmodel->task_bearbeiten();
                }
            } elseif ($result == "Speichern") {
                $taskmodel->task_speichern();
            } elseif ($result == "Löschen") {
                if (isset($_POST['id']) && $_POST['id'] != '') {
                    $taskmodel->task_loeschen($id);
                }
            }


            return redirect()->to(base_url('Tasks/Startseite'));


        } else{

            $data['tasks'] = $_POST;
            $data['error'] = $validation->getErrors();

            //$data['todo'] = 0;

            echo view('templates/head');
            echo view('taskedit', $data);
            echo view('templates/footer');
        }
    }




    }