
<?php
use App\Models\PersonenModel;
use App\Models\SpaltenModel;
use App\Controllers\TaskController;

?>



<!-- Formular -->

<div class="container-fluid mb-3">
    <div class="card">
        <div class="card-header fw-bold mb-3">
            Task erstellen
        </div>

        <div class="card-body">
            <form action="<?= base_url('TaskController/Speichern') ?>" method="post">
                <fieldset>


                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="inputTaskBez">Taskbezeichnung</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputTaskBez" name="inputTaskBez" placeholder="Bezeichnung der Aufgabe">
                        </div>
                    </div>



                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="selectTaskart">Taskart</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="selectTaskart" name="selectTaskart">
                                <?php foreach ($taskarten as $taskart): ?>
                                    <option value="<?= $taskart['id'] ?>">
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
                                    <option value="<?= $person['id'] ?>">
                                        <?= $person['vorname'] . ' ' . $person['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>


                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="inputErstellungsdatum">Erstellungsdatum</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputErstellungsdatum" name="inputErstellungsdatum" >
                        </div>
                    </div>




                    <div class=" mb-2 row">
                        <label class="col-sm-2 col-form-label" for="inputErinnerungsdatum">Erinnerungsdatum</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="inputErinnerungsdatum" name="inputErinnerungsdatum">
                        </div>

                        <label class="col-sm-2 col-form-label text-sm-end" for="inputErinnerungszeit">Zeit</label>
                        <div class="col-sm-4">
                            <input type="time" class="form-control" id="inputErinnerungszeit" name="inputErinnerungszeit">
                        </div>
                    </div>


                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="selectErinnerung">Erinnerung</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="selectErinnerung" name="selectErinnerung">

                                    <option> 0</option>
                                    <option> 1</option>

                            </select>
                        </div>
                    </div>

                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="inputNotiz">Notiz</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="inputNotiz" name="inputNotiz" rows="4"></textarea>
                        </div>
                    </div>


                    <div class="mb-5 row">
                        <label class="col-sm-2 col-form-label" for="selectSpalte">Spalte</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="selectSpalte" name="selectSpalte">
                                <?php foreach ($spalten as $spalte): ?>
                                    <option value="<?= $spalte['id'] ?>">
                                        <?= $spalte['spalte'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>







                    <div class="mb-4">

                    <button type="submit" class="btn btn-success mb-2" role="button">Speichern</button>
                    <a class="btn btn-secondary  mb-2" href="<?= base_url('StartseitenController/Startseite') ?>" role="button">Abbrechen</a>

                    </div>

                </fieldset>
            </form>



        </div>
    </div>
</div>
