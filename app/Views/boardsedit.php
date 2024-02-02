<?php
use App\Models\PersonenModel;
use App\Models\boardsModel;
use App\Models\TaskModel;
use App\Controllers\Tasks;

?>

<!-- Todo: 0 = Erstellen, 1 = Bearbeiten, 2 = Löschen -->

<!-- Formular -->



<div class="container-fluid mb-3 h-100">
    <div class="card">
        <div class="card-header fw-bold mb-3">
            Board erstellen, bearbeiten oder löschen
        </div>

        <div class="card-body">
            <form action="<?= base_url('Boards/CRUD') ?>" method="post">
                <fieldset>

                    <input type="hidden" name="id" value="<?= isset($boards) ? esc($boards['id']) : '' ?>">

                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="board">Boardsbezeichnung</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?=isset($error['board']) ? 'is-invalid' : '' ?>"
                                   id="board" name="board" placeholder="Bezeichnung des Board"
                                   value="<?= isset($boards) ? $boards['board'] : '' ?>">
                            <div class="invalid-feedback">
                                <?= isset($error['board']) ? $error['board'] : '' ?>
                            </div>
                        </div>
                    </div>

                    <? if($todo == 0): ?>
                        <button type="submit" class="btn btn-primary mb-2" role="button" name="buttonCRUD" value="Speichern">Speichern</button>
                    <? elseif($todo == 1): ?>
                        <button type="submit" class="btn btn-success mb-2" role="button" name="buttonCRUD" value="Bearbeiten">Bearbeiten</button>
                    <? elseif($todo == 2): ?>
                        <button type="submit" class="btn btn-danger mb-2" role="button" name="buttonCRUD" value="Löschen">Löschen</button>
                    <? endif; ?>
                    <a class="btn btn-secondary  mb-2" href="<?= base_url('Boards/Boardsseite') ?>" role="button">Abbrechen</a>

                </fieldset>
            </form>
        </div>
    </div>
</div>