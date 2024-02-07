<?php

use App\Models\TaskModel;
use App\Controllers\Tasks;



?>



<div class="container-fluid ">
    <div class="card ">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Boards</h3>
            <a class="btn btn-primary btn-sm" href="<?= base_url('Boards/BoardsCRUD') ?>" role="button">Neu</a>
        </div>


        <div class="card-body">
            <table class="table table-striped table-bordered table-responsive d-table table-hover m-0"
                   id="table"
                   data-show-toggle="true"
                   data-toggle="table"
                   data-search="true"
                   data-show-columns="true"
                   data-id-table="advancedTable"
                   data-show-button-icons="true"

                   data-icons-prefix="fas"
            >

                <thead>
                <tr>
                    <th data-field="id" data-sortable="true">ID</th>
                    <th data-field="name" data-sortable="true">Board</th>
                    <th data-field="price" data-sortable="true">Bearbeiten</th>


                </tr>
                </thead>
                <tbody>
                 <?php foreach ($boards as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['board'] ?></td>






                        <td>
                            <div class="d-flex fill-height justify-content-start">
                                <form action="<?= base_url('Boards/BoardsCRUD/' . $item['id'].'/'.'1') ?>" method="get">
                                    <button type="submit" class="btn btn-link" >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </form>

                                <form action="<?= base_url('Boards/BoardsCRUD/' . $item['id'] . '/' . '2') ?>" method="get">
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