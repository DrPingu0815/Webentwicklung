<?php

use App\Models\TaskModel;
use App\Controllers\Tasks;



?>

<div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Tasks</h3>
                    <a class="btn btn-primary btn-sm" href="<?= base_url('Tasks/TaskCRUD') ?>" role="button">Neu</a>
                </div>

                <div class="card-body">
                    <div class="row flex-nowrap overflow-x-auto">
                        <?php foreach ($spalte as $item): ?>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><?= $item['spalte'] ?></h4>

                                        <a><?= $item['spaltenbeschreibung'] ?></a>

                                    </div>
                                    <div class="card-body">
                                        <?php foreach ($tasks as $task): ?>
                                            <?php if ($task['spalte'] == $item['spalte']): ?>
                                        <div class="card mb-2">

                                                <p><strong>TaskID:</strong> <?= $task['id'] ?></p>
                                                <p><strong>Vorname:</strong> <?= $task['vorname'] ?></p>
                                                <p><strong>Nachname:</strong> <?= $task['name'] ?></p>
                                                <p><strong>Taskart:</strong> <?= $task['taskart'] ?></p>
                                                <p><strong>SortID:</strong> <?= $task['sortid'] ?></p>
                                                <p><strong>Task:</strong> <?= $task['tasks'] ?></p>
                                                <p><strong>Erstellungsdatum:</strong> <?= $task['erstellungsdatum'] ?></p>
                                                <p><strong>Erinnerungsdatum:</strong> <?= $task['erinnerungsdatum'] ?></p>

                                        </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>






