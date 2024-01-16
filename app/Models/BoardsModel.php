<?php

namespace App\Models;

use CodeIgniter\Model;


class BoardsModel extends Model
{
    public function getBoards($id = NULL)
    {
        $db = db_connect();

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
}