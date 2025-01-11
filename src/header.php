<script>
    const site = '<?= $site ?>';
</script>
<script>
    //Settings
    const ConsentManager = {
        title: "CleanUp Wien",
        info_text: "Diese Website verwendet mit Absicht keine Cookies. Durch die Nutzung unserer Website stimmen Sie unserer Verwendung von möglichen Datenverarbeitungen bestimmter Interaktionen zu. <a href='<?= $site ?>agb'>Mehr erfahren</a>",
        button_text: "Ich nehme das zur Kenntnis",
        zIndex: 9999,
        position: 17,
        credit: false,
        background_color: "rgba(0,0,0,0.5)",
        text_color: "white",
        consentInfoChangedOn: "2018-01-01",
        // cover: "rgba(0,0,0,0.5)", // or just 0.5
    };

    //   const ConsentManager = {
    //         title: "ConsentManager",
    //         info_text: `This website uses cookies to ensure you get the best experience on our website. By using our website you agree to our use of cookies.
    //         <a href="https://www.google.com/intl/en/policies/technologies/cookies/">Learn more</a>`,
    //         button_text: "Accept",
    //         text_color: "white",
    //         credit: true,
    //         position: 14,
    //         cover: "rgba(0,0,0,0.5)", // or just 0.5
    //         zIndex: 1111, // on standard 9999
    //         consentInfoChangedOn: "2018-01-01",
    //       };
</script>
<script type="module" src="<?= $site ?>js/consent-manager-v1.js"></script>
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
                <a id="riddles" class="nav-link purple" href="<?= $site ?>all">Alle Einmeldungen</a>
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