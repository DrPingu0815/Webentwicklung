<?php
use App\Models\Startseite;
use App\Controllers\StartseitenController;
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Tasks</h3>
           <!-- <a class="btn btn-primary btn-sm" href="<?= base_url('TaskController/TaskMaske') ?>" role="button">Neu</a> -->
            <a class="btn btn-primary btn-sm" href="<?= base_url('TaskController/TaskCRUD') ?>" role="button">Neu</a>
        </div>


        <div class="card-body">
            <table class="table table-striped table-bordered table-responsive d-table table-hover ms-2 me-2"
                   data-show-columns="true"
                   data-show-toggle="true"
                   data-toggle="table"
                   data-search="true"
                   data-toolbar="#toolbar"
            >

            <thead>
                <tr>
                    <th data-sortable="true">TaskID</th>
                    <th data-sortable="true">Vorname</th>
                    <th data-sortable="true">Nachname</th>
                    <th data-sortable="true">Taskart</th>
                    <th data-sortable="true">Spalte</th>
                    <th data-sortable="true">SortID</th>
                    <th data-sortable="true">Task</th>
                    <th data-sortable="true">Erstellungsdatum</th>
                    <th data-sortable="true">Erinnerungsdatum</th>
                    <th data-sortable="true">Erinnerung</th>
                    <th data-sortable="true">Notizen</th>
                    <th data-sortable="true">Erledigt</th>
                    <th data-sortable="true">Gelöscht</th>
                    <th data-sortable="true">Bearbeiten</th>
                </tr>
                </thead>
                    <tbody>
                    <?php foreach ($tasks as $item): ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['vorname'] ?></td>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['taskart'] ?></td>
                            <td><?= $item['spalte'] ?></td>
                            <td><?= $item['sortid'] ?></td>
                            <td><?= $item['tasks'] ?></td>
                            <td><?= $item['erstellungsdatum'] ?></td>
                            <td><?= $item['erinnerungsdatum'] ?></td>
                            <td><?= $item['erinnerung'] ?></td>
                            <td><?= $item['notizen'] ?></td>
                            <td><?= $item['erledigt'] ?></td>
                            <td><?= $item['geloescht'] ?></td>

                            <td>
                                <div class="d-flex fill-height justify-content-start">
                                  <!--  <form action="<?= base_url('TaskController/TasksBearbeiten/' . $item['id']) ?>" method="get"> -->
                                    <form action="<?= base_url('TaskController/TaskCRUD/' . $item['id'].'/'.'1') ?>" method="get">
                                        <button type="submit" class="btn btn-link" >
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </form>

                                   <!-- <form action="<?= base_url('TaskController/TasksLoeschen/' . $item['id']) ?>" method="get"> -->
                                    <form action="<?= base_url('TaskController/TaskCRUD/' . $item['id'] . '/' . 2) ?>" method="get">
                                        <button type="submit" class="btn btn-link">
                                            <i class="fa-solid fa-trash-alt ms-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>


                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


