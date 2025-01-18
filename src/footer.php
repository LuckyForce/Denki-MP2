<?php
//Footer Daten
$name = "Adrian Schauer und Ilie Borsanov";
$address = "TU Wien";
$email = "info@adrian-schauer.at";
?>
</div>
<div class="bg-dark-grey purple mb-0">
    <div class="row m-0">
        <div class="col centralizer">
            <br>
            <br>
            <p>Impressum:</p>
            <p><?= $name ?></p>
            <p><?= $address ?></p>
            <p>
                <a href="mailto:<?= $email ?>" class="mail purple"><?= $email ?></a>
            </p>
            <br>
        </div>
        <div class="col centralizer">
            <p>&copy; 2025 TU Wien<br>MP 2</p>
            <p>AGB:<br><a href="<?= $site ?>agb" class="purple"><?= $site ?>agb</a></p>
        </div>
    </div>
</div>