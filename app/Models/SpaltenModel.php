<?php

namespace App\Models;

use CodeIgniter\Model;


class SpaltenModel extends Model
{
    public function getSpalten($id = NULL)
    {

        $this->spalten = $this->db->table('spalten s');
        $this->spalten->select('s.*, b.board');
        $this->spalten->join('boards b', 's.boardsid = b.id');



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


    public function getSpaltenWithoutBoard($id = NULL)
    {

        $this->spalten = $this->db->table('spalten s');
        $this->spalten->where('id', $id);
        $result = $this->spalten->get();



        if ($id != NULL) {
            return $result->getRowArray();
        } else {
            return $result->getResultArray();
        }




    }









    public function spalten_speichern()
    {

        $this->spalten = $this->db->table('spalten');

        $this->spalten->insert(array(
            'sortid' => $_POST['sortid'],
            'spalte' => $_POST['spaltenbezeichnung'],
            'spaltenbeschreibung'=> $_POST['spaltenbeschreibung'],
            'boardsid' => 1

        ));


    }






    public function spalten_bearbeiten()
    {

        $this->spalten = $this->db->table('spalten');
        $this->spalten->where('id', $_POST['id']);
        $this->spalten->update(array(
            'sortid' => $_POST['sortid'],
            'spalte' => $_POST['spaltenbezeichnung'],
            'spaltenbeschreibung'=> $_POST['spaltenbeschreibung'],
            'boardsid' => 1

        ));
    }


    public function spalten_loeschen()
    {

        $this->spalten = $this->db->table('spalten');
        $this->spalten->where('id', $_POST['id']);
        $this->spalten->delete();

    }










}