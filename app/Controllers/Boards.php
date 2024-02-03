<?php

namespace App\Controllers;

use App\Models\BoardsModel;
use App\Models\SpaltenModel;

class Boards extends BaseController
{


    public function getBoardsseite()
    {


        $boards = new BoardsModel();
        $data['boards'] = $boards->getBoards();

        echo view('templates/head');
        echo view('templates/menu');
        echo view('boards', $data);
        echo view('templates/footer');

    }


    public function getBoardsCRUD($id = 0, $todo = 0)
    {
        // Todo: 0 = Erstellen, 1 = Bearbeiten, 2 = Löschen

        $data['todo'] = $todo;
        $boards = new BoardsModel();

        if ($id > 0 && ($todo == 1 || $todo == 2)) {

            $data['boards'] = $boards->getBoards($id);

        }

        // Andere notwendige Daten für das Formular


        echo view('templates/head');
        echo view('templates/menu');
        echo view('boardsedit', $data);
        echo view('templates/footer');


        $this->session->set('data', $data);
        // var_dump($this->session->get('data'));
    }



        public
        function postCRUD()
        {

            $boardsmodel = new BoardsModel();
            $result = $this->request->getPost('buttonCRUD');
            $id = $this->request->getPost('id');

            if ($this->validation->run($_POST, "boardsbearbeiten")) {


                if ($result == "Bearbeiten") {

                    if (isset($_POST['id']) && $_POST['id'] != '') {
                        $boardsmodel->boards_bearbeiten();
                    }
                } elseif ($result == "Speichern") {
                    $boardsmodel->boards_speichern();
                } elseif ($result == "Löschen") {
                    if (isset($_POST['id']) && $_POST['id'] != '') {
                        $boardsmodel->boards_loeschen();
                    }
                }

                return redirect()->to(base_url('boards/boardsseite'));

            } else {

                // Ruft die Infromation Sitzung wieder auf.

                $data = $this->session->get('data');
                $data['boards'] = $_POST;

                $data['error'] = $this->validation->getErrors();

                //var_dump($data);
                // var_dump($data['error']);


                echo view('templates/head');
                echo view('templates/menu');
                echo view('boardsedit', $data);
                echo view('templates/footer');


            }


        }

}