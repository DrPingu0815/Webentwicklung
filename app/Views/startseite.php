<?php

use App\Models\TaskModel;
use App\Controllers\Tasks;



?>

<div class="container-fluid">
            <div class="card mb-3 ">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between">
                        <div>
                            <span class="h3">Tasks</span>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-primary dropdown-toggle me-2" type="button" id="dropdownBoards" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownBoards">
                                <?php foreach ($boardbyid as $board) : ?>
                                    <a class="dropdown-item" href="<?= base_url('Tasks/Startseite/' . $board['id']) ?>"><?= $board['board'] ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                    <a class="btn btn-primary btn-sm" href="<?= base_url('Tasks/TaskCRUD') ?>" role="button"> <i class="fa-solid fa-plus"></i> Neu</a>
                    </div>


                    <div class="row flex-nowrap overflow-x-auto">
                        <?php foreach ($spalte as $item): ?>
                        <?php if ($item['board'] == $board['board']): ?>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title"><?= $item['spalte'] ?></h5>

                                        <a><?= $item['spaltenbeschreibung'] ?></a>

                                    </div>


                                    <div class="card-body">
                                        <?php foreach ($tasks as $task): ?>
                                            <?php if ($task['spalte'] == $item['spalte']): ?>
                                        <div class="card mb-2">
                                            <div class="container-fluid">

                                                <!-- Taskartenicon, und Taskbezeichnung inklusive Aktionen zugehörig zu der Task -->

                                                <div class="d-flex justify-content-between mb-1">
                                                    <a href="<?= base_url('Tasks/TaskCRUD/' . $task['id'].'/'.'1') ?>" class="text-decoration-none">
                                                        <p class="ms-2 mt-3"><?= $task['taskartenicon'] ?> <?= $task['tasks'] ?></p>
                                                    </a>



                                                        <span class="dropdown position-static mt-3">
                                                    <a class="btn btn-link ps-0 pt-0 pb-0 pe-2" role="button" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false" >
                                                        <i class="fas fa-caret-square-down text-primary"></i>
                                                    </a>
                                                        <div class="dropdown-menu">
                                                            <li>
                                                            <p class="dropdown-item mb-0"><strong>Aktionen</strong></p>
                                                            </li>
                                                            <li class="dropdown-divider"></li>
                                                            <li>
                                                                  <a id='btnBearbeiten' class="dropdown-item" href="<?= base_url('Tasks/TaskCRUD/' . $task['id'].'/'.'1') ?>">
                                                                      <span title="Task bearbeiten" class="icon-menu text-primary"><i class="fas fa-edit"></i></span>
                                                                            Task bearbeiten
                                                                  </a>
                                                            </li>

                                                            <li>
                                                                <a id='btnLoeschen' class="dropdown-item" href="<?= base_url('Tasks/TaskCRUD/' . $task['id'] . '/' . 2) ?>">
                                                                     <span title="Task löschen" class="icon-menu text-primary"><i class="fa-solid fa-trash"></i></span>
                                                                        Task löschen
                                                                </a>

                                                            </li>


                                                        </div>
                                                    </span>
                                                </div>



                                                <!-- Erstellungsdatum -->

                                                <div class="mb-1 d-flex justify-content-between">
                                                    <div class="text-secondary">
                                                        <p class="ms-2">
                                                            <i class="fa-solid fa-calendar me-1"></i>
                                                            <?= $task['erstellungsdatum'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="me-2 text-secondary">

                                                        <p class="d-flex align-items-center ms-2">
                                                            <i class="fa-regular fa-bell me-1" style="color: red;"></i>
                                                            <?= $task['erinnerungsdatum'] ?>
                                                        </p>
                                                    </div>
                                                </div>


                                                <!-- Name und Vorname der Person -->

                                                <div class="mb-1">

                                                    <p class="ms-2 text-secondary">
                                                     <i class="fa-regular fa-user me-1"></i>
                                                     <?= $task['vorname'] ?>
                                                     <?= $task['name'] ?>
                                                    </p>
                                                </div>


                                                <div class="mb-1">
                                                    <p class="ms-2 text-secondary">
                                                        <i class="fa-regular fa-message"></i>
                                                        <?= $task['notizen'] ?>
                                                    </p>


                                                </div>







                                        </div>
                                        </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>

                                        <div class="container-fluid mb-2">


                                        <a href="<?= base_url('Tasks/TaskCRUD') ?>">
                                            <button class="btn btn-primary w-100" type="button" name="btnNeu" id="btnNeu">
                                                <i class="fas fa-plus-square"></i> Neu
                                            </button>
                                        </a>
                                        </div>
                                    </div>


                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
</div>









