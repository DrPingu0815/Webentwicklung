<?php

namespace App\Models;

use CodeIgniter\Model;


class BoardsModel extends Model
{
    public function getBoards($id = NULL)
    {

        $this->boards = $this->db->table('boards');
        $this->boards->select('*');

        if ($id != NULL) {
            $this->boards->where('id', $id);
        }

        $result = $this->boards->get();

        if ($id != NULL) {
            return $result->getRowArray();
        } else {
            return $result->getResultArray();
        }
    }


    // In Ihrer BoardsModel-Klasse
    public function getBoardsbyID($id = 1)
    {
        $this->boards = $this->db->table('boards');
        $this->boards->select('*');
        $this->boards->where('id', $id);

        $result = $this->boards->get();

        return $result->getRowArray();
    }










    public function boards_speichern()
    {

        $this->boards = $this->db->table('boards');

        $this->boards->insert(array(
            'board' => $_POST['board']
        ));

    }

    public function boards_bearbeiten()
    {
        $this->boards = $this->db->table('boards');
        $this->boards->where('id', $_POST['id']);
        $this->boards->update(array(
            'board' => $_POST['board']
        ));
    }

    public function boards_loeschen()
    {
        $this->boards = $this->db->table('boards');
        $this->boards->where('id', $_POST['id']);
        $this->boards->delete();
    }

}