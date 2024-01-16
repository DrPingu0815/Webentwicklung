<?php

namespace App\Models;

use CodeIgniter\Model;



class Startseite extends Model
{
    public function getTasks($id = NULL)
    {
        $this->tasks = $this->db->table('tasks t');
        $this->tasks->select('t.*, p.vorname, p.name, ta.taskart, s.spalte');
        $this->tasks->join('personen p', 't.personenid = p.id');
        $this->tasks->join('spalten s', 't.spaltenid = s.id');
        $this->tasks->join('taskarten ta', 't.taskartenid = ta.id');
        $this->tasks->orderBy('p.vorname', 'asc');



        if ($id != NULL) {
            $this->tasks->where('t.id', $id);
        }

        $result = $this->tasks->get();

        if ($id != NULL) {
            return $result->getRowArray();
        } else {
            return $result->getResultArray();
        }
    }




public function getLoeschen($id)
    {
        $this->db->table('tasks')->where('id', $id)->delete();
    }



}