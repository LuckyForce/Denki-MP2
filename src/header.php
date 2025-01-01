<script>
    const site = '<?= $site ?>';
</script>
<nav class="navbar bg-dark-grey navbar-expand-lg navbar-dark">
    <a id="homepage-icon" class="navbar-brand ms-3" href="<?= $site ?>">
        <!--<i class="fas fa-home fa-2x"></i>-->
        <span class="material-icons-round purple">
            Home
        </span>
    </a>
    <button class="navbar-toggler me-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
            <li class="nav-item ms-3">
                <a id="riddles" class="nav-link purple" href="<?= $site ?>all">Alle Einmeldungung</a>
            </li>
            <li class="nav-item ms-3">
                <a id="logictable" class="nav-link purple" href="<?= $site ?>new">Neue Einmeldung</a>
            </li>
        </ul>
        <!-- <ul class="navbar-nav">
            <li class="loggedin invisible nav-item ms-3">
                <a id="user" class="nav-link purple" href="<?= $site ?>user"><i class="fas fa-user fa-2x"></i></a>
            </li>
            <li class="loggedout invisible nav-item ms-3">
                <a id="login" class="nav-link purple" href="<?= $site ?>login">Login</a>
            </li>
            <li class="loggedout invisible nav-item ms-3">
                <a id="signup" class="nav-link purple" href="<?= $site ?>signup">Sign Up</a>
            </li>
        </ul> -->
    </div>
</nav>
<div class="content bg-dark-purple">