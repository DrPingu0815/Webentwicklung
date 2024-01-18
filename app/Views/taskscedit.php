
<?php
use App\Models\PersonenModel;
use App\Models\SpaltenModel;
use App\Models\TaskModel;

?>

<!-- Todo: 0 = Erstellen, 1 = Bearbeiten, 2 = Löschen -->

<!-- Formular -->

<div class="container-fluid mb-3">
    <div class="card">
        <div class="card-header fw-bold mb-3">
            Task bearbeiten
        </div>

        <div class="card-body">
            <form action="<?= base_url('TaskController/CRUD') ?>" method="post">
                <fieldset>

                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="inputTaskBez">Taskbezeichnung</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputTaskBez" name="inputTaskBez" placeholder="Bezeichnung der Aufgabe" value="<?= ($todo != 0) ? esc($tasks['tasks']) : '' ?>">
                        </div>
                    </div>


                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="selectTaskart">Taskart</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="selectTaskart" name="selectTaskart">
                                <?php foreach ($taskarten as $taskart): ?>
                                    <option value="<?= $taskart['id'] ?>" <?= isset($tasks) && ($taskart['id'] == $tasks['taskartenid']) ? 'selected' : '' ?>>
                                        <?= $taskart['taskart'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>


                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="selectPersonen">Person</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="selectPersonen" name="selectPersonen">
                                <?php foreach ($personen as $person): ?>
                                    <option value="<?= $person['id'] ?>" <?= isset($tasks) && ($person['id'] == $tasks['personenid']) ? ' selected' : ''?>>
                                        <?= $person['vorname'] . ' ' . $person['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <? if($todo == 0): ?>
                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="inputErstellungsdatum">Erstellungsdatum</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputErstellungsdatum" name="inputErstellungsdatum" >
                        </div>
                    </div>
                    <? endif; ?>

                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="inputErinnerungsdatum">Erinnerungsdatum</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" id="inputErinnerungsdatum" name="inputErinnerungsdatum" value="<?=  isset($tasks) ? esc($tasks['erinnerungsdatum']) : '' ?>">
                        </div>
                    </div>


                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="selectErinnerung">Erinnerung</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="selectErinnerung" name="selectErinnerung">
                                <option value="0" <?= isset($tasks) && ($tasks['erinnerung'] == 0) ? 'selected' : '' ?>>0</option>
                                <option value="1" <?= isset($tasks) && ($tasks['erinnerung'] == 1) ? 'selected' : '' ?>>1</option>
                            </select>
                        </div>
                    </div>


                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="inputNotiz">Notiz</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="inputNotiz" name="inputNotiz" rows="4"><?= isset($tasks) ? esc($tasks['notizen']) : '' ?></textarea>
                        </div>
                    </div>


                    <div class="mb-5 row">
                        <label class="col-sm-2 col-form-label" for="selectSpalte">Spalte</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="selectSpalte" name="selectSpalte">
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
                        <button type="submit" class="btn btn-success mb-2" role="button" name="buttonCRUD" value="Speichern">Speichern</button>
                    <? elseif($todo == 1): ?>
                        <button type="submit" class="btn btn-success mb-2" role="button" name="buttonCRUD" value="Bearbeiten">Bearbeiten</button>
                    <? elseif($todo == 2): ?>
                        <button type="submit" class="btn btn-success mb-2" role="button" name="buttonCRUD" value="Löschen">Löschen</button>
                    <? endif; ?>
                    <a class="btn btn-secondary  mb-2" href="<?= base_url('StartseitenController/Startseite') ?>" role="button">Abbrechen</a>

                </fieldset>
            </form>
        </div>
    </div>
</div>
