
<?php
use App\Models\PersonenModel;
use App\Models\SpaltenModel;
use App\Models\TaskModel;
use App\Controllers\Tasks;

?>

<!-- Todo: 0 = Erstellen, 1 = Bearbeiten, 2 = Löschen -->

<!-- Formular -->



<div class="container-fluid mb-3 h-100">
    <div class="card">
        <div class="card-header fw-bold mb-3">
            Spalte erstellen, bearbeiten oder löschen
        </div>

        <div class="card-body">
            <form action="<?= base_url('Spalten/CRUD') ?>" method="post">
                <fieldset>

                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="spaltenbezeichnung">Spaltenbezeichnung</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="spaltenbezeichnung" name="spaltenbezeichnung" placeholder="Bezeichnung der Spalte" value="<?= ($todo != 0) ? esc($spalten['spalte']) : '' ?>">
                        </div>
                    </div>



                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="sapltenbeschreibung">Spaltenbeschreibung</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="spaltenbeschreibung" name="spaltenbeschreibung" rows="4"><?= isset($spalten) ? esc($spalten['spaltenbeschreibung']) : '' ?></textarea>
                        </div>
                    </div>



                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="sortid">SortID</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="sortid" name="sortid" value="<?=  isset($tasks) ? esc($tasks['erinnerungsdatum']) : '' ?>">
                        </div>
                    </div>



                    <input type="hidden" name="id" value="<?= isset($spalten) ? esc($spalten['id']) : '' ?>">

                    <? if($todo == 0): ?>
                        <button type="submit" class="btn btn-primary mb-2" role="button" name="buttonCRUD" value="Speichern">Speichern</button>
                    <? elseif($todo == 1): ?>
                        <button type="submit" class="btn btn-success mb-2" role="button" name="buttonCRUD" value="Bearbeiten">Bearbeiten</button>
                    <? elseif($todo == 2): ?>
                        <button type="submit" class="btn btn-danger mb-2" role="button" name="buttonCRUD" value="Löschen">Löschen</button>
                    <? endif; ?>
                    <a class="btn btn-secondary  mb-2" href="<?= base_url('Spalten/Spaltenseite') ?>" role="button">Abbrechen</a>

                </fieldset>
            </form>
        </div>
    </div>
</div>
