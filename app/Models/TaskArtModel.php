<?php

namespace App\Models;

use CodeIgniter\Model;


class TaskArtModel extends Model
{

    public function getTaskarten($id = NULL)
    {
        //$db = db_connect();

        $this->taskarten = $this->db->table('taskarten');
        $this->taskarten->select('*');

        if ($id != NULL) {
            $this->taskarten->where('id', $id);
        }

        $result = $this->taskarten->get();

        if ($id != NULL) {
            return $result->getRowArray();
        } else {
            return $result->getResultArray();
        }
    }
}