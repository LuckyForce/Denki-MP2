<?php
require "../path.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TU Wien</title>
    <link rel="stylesheet" href="<?= $path_style ?>" />
    <link rel="stylesheet" href="<?= $path_bootstrap ?>" />
    <script src="<?= $path_jquery_js ?>"></script>
    <script src="<?= $path_bootstrap_js ?>"></script>
    <script type="module" src="js/index.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" />
</head>

<body>
    <?php include '../header.php'; ?>

    <?php include 'content.php'; ?>

    <?php include '../footer.php'; ?>
</body>

</html>