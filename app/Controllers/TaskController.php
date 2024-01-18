<?php

namespace App\Controllers;

use App\Models\BoardsModel;
use App\Models\Startseite;
use App\Models\PersonenModel;
use App\Models\SpaltenModel;
use App\Models\TaskArtModel;
use App\Models\TaskModel;




class TaskController extends BaseController
{

    public function getTaskCRUD($id = 0, $todo = 0){
        // Todo: 0 = Erstellen, 1 = Bearbeiten, 2 = Löschen

        $data['todo'] = $todo;

        if($todo != 0){
            $firstmodel = new Startseite();
            $data['tasks'] = $firstmodel->getTasks($id);
        }else{
            $data['tasks'] = null;
        }

        // Andere notwendige Daten für das Formular
        $personenmodel = new PersonenModel();
        $data['personen'] = $personenmodel->getPersonen();

        $spaltenmodel = new SpaltenModel();
        $data['spalten'] = $spaltenmodel->getSpalten();

        $taskartenmodel = new TaskArtModel();
        $data['taskarten'] = $taskartenmodel->getTaskarten();

        echo view('templates/head');
        echo view('taskscedit', $data);
        echo view('templates/footer');
    }

    public function postCRUD(){
        var_dump($_POST);
        $result = $this->request->getPost('buttonCRUD');

        if($result == "Speichern"){
            return $this->postSpeichern();
        }elseif ($result == "Bearbeiten"){
            return $this->postBearbeiten();
        }elseif ($result == "Löschen"){
            return $this->postTasksLoeschen();
        }
        echo 'fail';
        echo $result;
        //return redirect()->to(base_url('StartseitenController/Startseite'));
    }

    public function getTaskMaske()
    {
        $personenmodel = new PersonenModel();
        $data['personen'] = $personenmodel->getPersonen();

        $spaltenmodel = new SpaltenModel();
        $data['spalten'] = $spaltenmodel->getSpalten();

        $taskartenmodel = new TaskArtModel();
        $data['taskarten'] = $taskartenmodel->getTaskarten();


        echo view('templates/head');
        echo view('taskErstellen', $data);
        echo view('templates/footer');
    }

    public function postSpeichern()
    {
        $tasksModel = new TaskModel();

        $data = [
            'tasks' => $this->request->getPost('inputTaskBez'),
            'taskartenid' => $this->request->getPost('selectTaskart'),
            'personenid' => $this->request->getPost('selectPersonen'),
            'erstellungsdatum' => $this->request->getPost('inputErstellungsdatum'),
            'erinnerungsdatum' => $this->request->getPost('inputErinnerungsdatum') . ' ' . $this->request->getPost('inputErinnerungszeit'),
            'erinnerung' => $this->request->getPost('selectErinnerung'),
            'notizen' => $this->request->getPost('inputNotiz'),
            'spaltenid' => $this->request->getPost('selectSpalte'),
        ];

        $tasksModel->getSpeichern($data);

        return redirect()->to(base_url('StartseitenController/Startseite'));
    }


    public function getTasksBearbeiten($id)
    {

        //$db = db_connect();

        $firstmodel = new Startseite();
        $data['tasks'] = $firstmodel->getTasks($id);

        // Andere notwendige Daten für das Formular
        $personenmodel = new PersonenModel();
        $data['personen'] = $personenmodel->getPersonen();

        $spaltenmodel = new SpaltenModel();
        $data['spalten'] = $spaltenmodel->getSpalten();

        $taskartenmodel = new TaskArtModel();
        $data['taskarten'] = $taskartenmodel->getTaskarten();

        echo view('templates/head');
        echo view('taskscedit', $data);
        echo view('templates/footer');
    }


    public function postBearbeiten()
    {
        $taskModel = new TaskModel();

        $id = $this->request->getPost('id');

        $data = [
            'tasks' => $this->request->getPost('inputTaskBez'),
            'taskartenid' => $this->request->getPost('selectTaskart'),
            'personenid' => $this->request->getPost('selectPersonen'),
            'erinnerungsdatum' => $this->request->getPost('inputErinnerungsdatum'),
            'erinnerung' => $this->request->getPost('selectErinnerung'),
            'notizen' => $this->request->getPost('inputNotiz'),
            'spaltenid' => $this->request->getPost('selectSpalte'),
        ];

        $taskModel->getBearbeiten($id, $data);

        return redirect()->to(base_url('StartseitenController/Startseite'));
    }



    public function getTasksLoeschen($id)
    {

        $db = db_connect();



        $firstmodel = new Startseite();
        $data['tasks'] = $firstmodel->getTasks($id);

        // Andere notwendige Daten für das Formular
        $personenmodel = new PersonenModel();
        $data['personen'] = $personenmodel->getPersonen();

        $spaltenmodel = new SpaltenModel();
        $data['spalten'] = $spaltenmodel->getSpalten();

        $taskartenmodel = new TaskArtModel();
        $data['taskarten'] = $taskartenmodel->getTaskarten();

        echo view('templates/head');
        echo view('taskLoeschen', $data);
        echo view('templates/footer');




    }





    public function postTasksLoeschen()
    {
        $taskModel = new TaskModel();

        $id = $this->request->getPost('id');


        $taskModel->getLoeschen($id);

        return redirect()->to(base_url('StartseitenController/Startseite'));
    }





}
