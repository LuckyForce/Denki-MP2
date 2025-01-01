<!--DONE: Frontend Riddle Explore Pane Filter and Cards
NOTE: This Panes von den einzelenn riddles werden im nachhinein reingeladen per JavaScript.
Hier muss nur das Frontend drum herum gemacht werden-->


<div class="bg-dark-purple">

    <div class="header-title">
        <h1>Alle Einmeldungungen</h1>
    </div>

    <div class="container ms-1">
        <button type="button" class="btn btn-default" data-bs-toggle="collapse" data-bs-target="#demo"><i class="fas fa-filter"></i></button>
    </div>

    <div class="container ms-1 mt-1">
        <button type="button" class="btn btn-default"><a href="<?= $site ?>new" class="btn-create">Eigene Einmeldung</a></button>
    </div>

    <div id="demo" class="collapse">
        <div class="container mt-5 mb-5">
            <div class="card bg-dark-grey">
                <form id="filter" class="p-1">
                    <div class="row mx-0 purple">
                        <div class="form-group col-md-3 mb-3 mt-1">
                            <label for="search-text">Suche nach Thema:</label>
                            <input type="text" class="form-control border" id="search-text" placeholder="Search" />
                        </div>
                        <div class="form-group col-md-3 mb-3 mt-1">
                            <label for="search-user">Suche nach Standort:</label>
                            <input type="text" class="form-control border" id="search-place" placeholder="Search" />
                        </div>
                        <div class="form-group col-md-3 mb-3 mt-1">
                            <label for="priority">Priorität:</label>
                            <select class="form-select" id="priority">
                                <option selected value="All">Alle</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 mb-3 mt-1">
                            <label for="order">Sortiere nach Datum:</label>
                            <select class="form-select" id="order">
                                <option value="desc">desc</option>
                                <option value="asc">asc</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="p-1">
        <div id="riddle-cards" class="row mx-5 my-3 justify-content-center">

        </div>
    </div>
</div>