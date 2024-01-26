<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Controllers\Tasks;


class TaskModel extends Model
{


    public function task_speichern()
    {

        $this->tasks = $this->db->table('tasks');

        $this->tasks->insert(array('tasks' => $_POST['tasks'],
            'taskartenid' => $_POST['taskart'],
            'personenid' => $_POST['person'],
            'erstellungsdatum' => $_POST['erstellungsdatum'],
            'erinnerungsdatum' => $_POST['erinnerungsdatum'],
            'erinnerung' => $_POST['erinnerung'],
            'notizen' => $_POST['notiz'],
            'spaltenid' => $_POST['spalte']));


    }


    public function task_bearbeiten()
    {

        $this->tasks = $this->db->table('tasks');
        $this->tasks->where('id', $_POST['id']);
        $this->tasks->update(array(
            'tasks' => $_POST['tasks'],
            'taskartenid' => $_POST['taskart'],
            'personenid' => $_POST['person'],
            'erstellungsdatum' => $_POST['erstellungsdatum'],
            'erinnerungsdatum' => $_POST['erinnerungsdatum'],
            'erinnerung' => $_POST['erinnerung'],
            'notizen' => $_POST['notiz'],
            'spaltenid' => $_POST['spalte']));
    }


    public function task_loeschen()
    {

        $this->tasks = $this->db->table('tasks');
        $this->tasks->where('id', $_POST['id']);
        $this->tasks->delete();

    }



    public function getTasks($taskid = NULL, $spaltenid = NULL)
    {
        $this->tasks = $this->db->table('tasks t');
        $this->tasks->select('t.*, p.vorname, p.name, ta.taskart, ta.taskartenicon, s.spalte');
        $this->tasks->join('personen p', 't.personenid = p.id');
        $this->tasks->join('spalten s', 't.spaltenid = s.id');
        $this->tasks->join('taskarten ta', 't.taskartenid = ta.id');
        $this->tasks->orderBy('p.vorname', 'asc');



        if ($taskid != NULL) {
            $this->tasks->where('t.id', $taskid);
        }

        $result = $this->tasks->get();

        if ($taskid != NULL) {
            return $result->getRowArray();
        } else {
            return $result->getResultArray();
        }
    }








}