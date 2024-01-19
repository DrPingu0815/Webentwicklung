
<?php
use App\Models\PersonenModel;
use App\Models\SpaltenModel;
use App\Models\TaskModel;
use App\Controllers\Tasks;

?>

<!-- Todo: 0 = Erstellen, 1 = Bearbeiten, 2 = Löschen -->

<!-- Formular -->



<div class="container-fluid mb-3  mt-3">
    <div class="card">
        <div class="card-header fw-bold mb-3">
            Task erstellen, bearbeiten oder löschen
        </div>

        <div class="card-body">
            <form action="<?= base_url('Tasks/CRUD') ?>" method="post">
                <fieldset>

                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="taskbezeichnung">Taskbezeichnung</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?=(isset($error['taskbezeichnung']))?'is-invalid':''?>"
                                   id="taskbezeichnung" name="taskbezeichnung" placeholder="Bezeichnung der Aufgabe"
                                   value="<?= ($todo != 0) ? esc($tasks['tasks']) : '' ?>">
                        </div>
                        <div class="invalid-feedback">
                            <?=(isset($error['taskbezeichnung']))?$error['taskbezeichnung']:''?>
                        </div>
                    </div>


                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="taskart">Taskart</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="taskart" name="taskart">
                                <?php foreach ($taskarten as $taskart): ?>
                                    <option value="<?= $taskart['id'] ?>" <?= isset($tasks) && ($taskart['id'] == $tasks['taskartenid']) ? 'selected' : '' ?>>
                                        <?= $taskart['taskart'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>


                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="person">Person</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="person" name="person">
                                <?php foreach ($personen as $person): ?>
                                    <option value="<?= $person['id'] ?>" <?= isset($tasks) && ($person['id'] == $tasks['personenid']) ? ' selected' : ''?>>
                                        <?= $person['vorname'] . ' ' . $person['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>


                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="erstellungsdatum">Erstellungsdatum</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control <?=(isset($error['erstellungsdatum']))?'is-invalid':''?>" id="erstellungsdatum" name="erstellungsdatum" value="<?=  isset($tasks) ? esc($tasks['erstellungsdatum']) : '' ?>">
                        </div>
                        <div class="invalid-feedback">
                            <?=(isset($error['erstellungsdatum']))?$error['erstellungsdatum']:''?>
                        </div>
                    </div>


                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="erinnerungsdatum">Erinnerungsdatum</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" class="form-control <?=(isset($error['erinnerungsdatum']))?'is-invalid':''?>" id="erinnerungsdatum" name="erinnerungsdatum" value="<?=  isset($tasks) ? esc($tasks['erinnerungsdatum']) : '' ?>">
                        </div>
                        <div class="invalid-feedback">
                            <?=(isset($error['erinnerungsdatum']))?$error['erinnerungsdatum']:''?>
                        </div>
                    </div>


                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="erinnerung">Erinnerung</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="erinnerung" name="erinnerung">
                                <option value="0" <?= isset($tasks) && ($tasks['erinnerung'] == 0) ? 'selected' : '' ?>>0</option>
                                <option value="1" <?= isset($tasks) && ($tasks['erinnerung'] == 1) ? 'selected' : '' ?>>1</option>
                            </select>
                        </div>

                    </div>


                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="notiz">Notiz</label>
                        <div class="col-sm-10">
                            <textarea class="form-control <?=(isset($error['notiz']))?'is-invalid':''?>"" id="notiz" name="notiz" rows="4"><?= isset($tasks) ? esc($tasks['notizen']) : '' ?></textarea>
                        </div>
                        <div class="invalid-feedback">
                            <?=(isset($error['notiz']))?$error['notiz']:''?>
                        </div>
                    </div>


                    <div class="mb-5 row">
                        <label class="col-sm-2 col-form-label" for="spalte">Spalte</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="spalte" name="spalte">
                                <?php foreach ($spalten as $spalte): ?>
                                    <option value="<?= $spalte['id'] ?>" <?= isset($tasks) && ($spalte['id'] == $tasks['spaltenid']) ? 'selected' : '' ?>  >
                                        <?= $spalte['spalte'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>

                    <input type="hidden" name="id" value="<?= isset($tasks) ? esc($tasks['id']) : '' ?>">

                    <? if($todo == 0): ?>
                        <button type="submit" class="btn btn-primary mb-2" role="button" name="buttonCRUD" value="Speichern">Speichern</button>
                    <? elseif($todo == 1): ?>
                        <button type="submit" class="btn btn-success mb-2" role="button" name="buttonCRUD" value="Bearbeiten">Bearbeiten</button>
                    <? elseif($todo == 2): ?>
                        <button type="submit" class="btn btn-danger mb-2" role="button" name="buttonCRUD" value="Löschen">Löschen</button>
                    <? endif; ?>
                    <a class="btn btn-secondary  mb-2" href="<?= base_url('Tasks/Startseite') ?>" role="button">Abbrechen</a>

                </fieldset>
            </form>
        </div>
    </div>
</div>


