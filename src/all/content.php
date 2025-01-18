<!--DONE: Frontend Riddle Explore Pane Filter and Cards
NOTE: This Panes von den einzelenn riddles werden im nachhinein reingeladen per JavaScript.
Hier muss nur das Frontend drum herum gemacht werden-->
<style>
    .entry-card {
        border: 1px solid #ddd;
        padding: 15px;
        margin: 10px 0;
        border-radius: 5px;
        /* background-color: #bd93f9 !important; */
    }

    .card {
        background-color: #282a36 !important;
    }

    .entry-card img {
        display: block;
        margin-top: 10px;
    }
</style>

<div class="bg-dark-purple">

    <div class="header-title">
        <h1>Alle Einmeldungen</h1>
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
                            <label for="priority">Gefahrenstufe:</label>
                            <select class="form-select" id="danger">
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
                    <button type="button" id="apply-filters" class="btn btn-primary mt-3">Filter Anwenden</button>
                </form>
            </div>
        </div>
    </div>

    <div class="p-1">
        <div id="entries" class="row mx-5 my-3 justify-content-center text-main bg-dark-purple">
            <!-- Entry cards will be dynamically loaded here -->
        </div>
    </div>

    <div class="pagination-container text-center mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <!-- Pagination buttons will be dynamically loaded here -->
            </ul>
        </nav>
    </div>
</div>