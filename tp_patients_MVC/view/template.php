<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>
</head>

<body>
    <style type="text/css">
        <?php include('./public/styles/style.php'); ?>
    </style>
    <!-- tout le contenu du $content est mit en mémoire tampon grâce à ob_start() et ob_get_clean() -->
    <?= $content ?>
</body>

</html>