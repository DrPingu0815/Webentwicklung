<?php

namespace App\Models;

use CodeIgniter\Model;


class SpaltenModel extends Model
{
    public function getSpalten($id = NULL)
    {
        $db = db_connect();

        $this->spalten = $this->db->table('spalten');
        $this->spalten->select('*');

        if ($id != NULL) {
            $this->spalten->where('id', $id);
        }

        $result = $this->spalten->get();

        if ($id != NULL) {
            return $result->getRowArray();
        } else {
            return $result->getResultArray();
        }
    }
}