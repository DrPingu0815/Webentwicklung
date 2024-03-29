<?php

namespace App\Controllers;

use App\Models\BoardsModel;
use App\Models\PersonenModel;
use App\Models\SpaltenModel;
use App\Models\TaskArtModel;
use App\Models\TaskModel;




class Tasks extends BaseController
{



    public function getStartseite($boardid = 1)
    {


        $tasks = new TaskModel();
        $data['tasks'] = $tasks->getTasks();

        $spalte = new SpaltenModel();
        $data['spalte'] = $spalte->getSpalten();

        $boards = new BoardsModel();
        $data['boards'] = $boards->getBoards();


        $boardsbyID  = new BoardsModel();
        $data['boardbyid'] = $boardsbyID->getBoardsbyID($boardid);








        //echo '<pre>';
        //var_dump($data);
        //echo '</pre>';
        //die();


        echo view('templates/head');
        echo view('templates/menu');
        echo view('startseite', $data);
        echo view('templates/footer');

    }





    public function getTaskCRUD($id = 0, $todo = 0, $spalte = 0){
        // Todo: 0 = Erstellen, 1 = Bearbeiten, 2 = Löschen



        $data['todo'] = $todo;
        $taskModel = new TaskModel();

        if ($id > 0 && ($todo == 1 || $todo == 2)) {

            $data['tasks'] = $taskModel->getTasks($id);


        }else{
            if($spalte != 0){
                $data['tasks'] = array('spaltenid'=>$spalte);
            }
        }


        // Andere notwendige Daten für das Formular
        $personenmodel = new PersonenModel();
        $data['personen'] = $personenmodel->getPersonen();

        $spaltenmodel = new SpaltenModel();
        $data['spalten'] = $spaltenmodel->getSpalten();

        $taskartenmodel = new TaskArtModel();
        $data['taskarten'] = $taskartenmodel->getTaskarten();

        $boards = new BoardsModel();
        $data['boards'] = $boards->getBoards();

        echo view('templates/head');
        echo view('templates/menu');
        echo view('taskedit', $data);
        echo view('templates/footer');

        $this->session->set('data',$data);
       // var_dump($this->session->get('data'));
    }











    public function postCRUD(){




        $taskmodel = new TaskModel();
        $result = $this->request->getPost('buttonCRUD');
        $id = $this->request->getPost('id');


        if($this->validation->run($_POST, "taskbearbeiten")) {

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
        }else{
            // Ruft die Infromation Sitzung wieder auf.

            $data = $this->session->get('data');
            $data['tasks'] = $_POST;


            //$data=array_merge($_POST,$data['tasks']);

            $data['error'] = $this->validation->getErrors();

            //var_dump($data);
           // var_dump($data['error']);


            echo view('templates/head');
            echo view('templates/menu');
            echo view('taskedit', $data);
            echo view('templates/footer');
        }

    }




}