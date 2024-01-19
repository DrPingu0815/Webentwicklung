<?php

namespace App\Models;

use CodeIgniter\Model;


class PersonenModel extends Model
{
    public function getPersonen($id = NULL)
    {

        $this->personen = $this->db->table('personen');
        $this->personen->select('*');

        if ($id != NULL) {
            $this->personen->where('id', $id);
        }

        $result = $this->personen->get();

        if ($id != NULL) {
            return $result->getRowArray();
        } else {
            return $result->getResultArray();
        }
    }
}