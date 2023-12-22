


<!-- Formular -->

<div class="container-fluid">
    <div class="card">
        <div class="card-header fw-bold mb-3">
            Spalte erstellen
        </div>

        <div class="card-body">
            <form>
                <fieldset>

                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="inputSpaltenBez">Spaltenbezeichnung</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputSpaltenBez" placeholder="Name der Spalte">
                        </div>
                    </div>

                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="inputSpaltenBeschreibung">Spaltenbeschreibung</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="inputSpaltenBeschreibung"></textarea>
                        </div>
                    </div>


                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label" for="inputSorid">Sortid</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputSorid" placeholder="Sortid angeben">
                        </div>
                    </div>

                    <div class="mb-5 row ">
                        <label class="col-sm-2 col-form-label" for="selectBoard">Board auswählen</label>
                        <div class="col-sm-10">
                            <select  class="form-select" id="selectBoard">
                                <option> Allgemeine Todos</option>
                                <option> IT-Todos</option>
                            </select>
                        </div>
                    </div>


                    <a class="btn btn-success  mb-2" href="" role="button">Speichern</a>
                    <a class="btn btn-secondary  mb-2" href="" role="button">Abbrechen</a>

                </fieldset>
            </form>



        </div>
    </div>
</div>
