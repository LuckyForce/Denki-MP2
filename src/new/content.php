<!--DONE: Login Formular, Successfully logedin, bereits logedin (Link auf /user).
Per JavaScript wird dann entschieden was angezeigt wird.-->

<div class="bg-dark-purple">
    <div class="header-title">
        <h1>Neuer Eintrag</h1>
    </div>

    <br>
    <br>
    <br>

    <div class="container col-md-5">
        <div class="card text-center bg-dark-grey purple">

            <script src="<?= $site ?>js/newEntry.js" type="module"></script>
            <form id="login-form" class="was-validated">
                <div class="row justify-content-center">
                    <div class="form-group col-md-4 mt-5">
                        <label for="title">Titel:<b class="red-star">*</b></label>
                        <input type="text" class="form-control border" id="title" placeholder="Titel" required />
                        <div class="invalid-feedback">Invalid!</div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group col-md-4 mt-2">
                        <label for="description">Beschreibung:<b class="red-star">*</b></label>
                        <textarea type="text" class="form-control border" id="description" placeholder="Beschreibung" required></textarea>
                        <div class="invalid-feedback">Invalid!</div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group col-md-4 mt-2">
                        <label for="place">Wo:<b class="red-star">*</b></label>
                        <input type="text" class="form-control border" id="place" placeholder="Wo" required />
                        <div class="invalid-feedback">Invalid!</div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group col-md-4 mt-2">
                        <label for="priority">Priorität:<b class="red-star">*</b></label>
                        <select class="form-select" id="priority" required>
                            <option selected value="" hidden>Bitte auswählen</option>
                            <option value="1">1 - Unwichtig</option>
                            <option value="2">2 - Nicht so wichtig</option>
                            <option value="3">3 - Normal</option>
                            <option value="4">4 - Wichtig</option>
                            <option value="5">5 - Sehr wichtig</option>
                        </select>
                        <div class="invalid-feedback">Invalid!</div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group col-md-4 mt-2">
                        <label for="danger">Gefahrenstufe:<b class="red-star">*</b></label>
                        <select class="form-select" id="danger" required>
                            <option selected value="" hidden>Bitte auswählen</option>
                            <option value="1">1 - Ungefährlich</option>
                            <option value="2">2 - Nicht so Gefährlich</option>
                            <option value="3">3 - Moderat</option>
                            <option value="4">4 - Gefährlich</option>
                            <option value="5">5 - Sehr gefährlich</option>
                        </select>
                        <div class="invalid-feedback">Invalid!</div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group col-md-4 mt-2">
                        <label for="picture">Picture:<b class="red-star">*</b></label>
                        <input type="file" class="form-control border" id="picture" accept=".png,.PNG,.jpg,.jpeg" required />
                        <!-- <div class="invalid-feedback">Invalid!</div> -->
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group col-md-4 mt-2">
                        <label for="agb" class="form-check-label">Ich habe die <a href="<?= $site ?>agb">AGB</a> gelesen und bin mit diesen einverstanden:</label>
                        <input type="checkbox" class="form-check-input" id="agb" required />
                        <div class="invalid-feedback">Invalid!</div>
                    </div>
                </div>
                <div class="form-group">
                    <button id="submit-button" class="btn col-4 mt-4 mb-5 btn-default" type="button">
                        Abschicken
                    </button>
                    <div id="information-bad">

                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


</div>