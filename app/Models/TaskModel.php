<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Controllers\TaskController;
use App\Controllers\TasksBearbeiten;
class TaskModel extends Model
{

    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tasks','taskartenid','personenid', 'erstellungsdatum', 'erinnerungsdatum', 'erinnerung', 'notizen', 'spaltenid'];

    public function getSpeichern($daten)
    {



        $db = db_connect();

        $tasks = $db->table($this->table);

        $tasks->insert($daten);

    }

    public function getBearbeiten($id, $daten)
    {
        $this->update($id, $daten);
    }


    public function getLoeschen($id)
    {

        $this->delete($id);


    }




}