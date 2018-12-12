<?php
    require_once('autoload.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Catalogue films Marvel</title>
</head>
<body>
    <header>
        <img src="/assets/images/logo.png" class="logo">
    </header>
    <div class="container no-padding">
        <nav class="menu">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li>
                    <a>Catalogue</a>
                    <ul class="animated flipInY">
                        <li><a href="/ajout.php">Ajout d'un film</a></li>
                        <li><a href="/suppression.php">Suppression</a></li>
                        <li><a href="">Modification</a></li>
                    </ul>
                </li>
            </ul>
        </nav>