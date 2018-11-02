<?php

if($_POST) {
    $titre = $_POST['titre'];
    $sortie = $_POST['sortie'];
    $url = $_POST['url'];
    $separator = '<#-#>';

    $file_count = fopen('./filecount.txt', 'r');
    $file_count_read = fgets($file_count);
    fclose($file_count);

    $standard_titre = strtolower($titre);
    $standard_titre = str_replace(' ', '-', $standard_titre);
    $standard_titre = str_replace(':', '', $standard_titre);
    
    $file_id = 'id'.$separator.str_pad(($file_count_read + 1), 5, '0', STR_PAD_LEFT);
    $file_date = 'date'.$separator.date('d/m/Y - H:i:s');
    $file_title = 'titre'.$separator.$titre;
    $file_sortie = 'sortie'.$separator. $sortie;
    $file_url = 'url'.$separator.$url;

    $write_film = fopen('./films/' . $standard_titre . '.txt', 'w+');
    $write_film_do = fwrite($write_film, $file_id."\r". $file_date . "\r" .$file_title."\r". $file_sortie ."\r".$file_url);
    fclose($write_film);

    $update_films_number = fopen('./filecount.txt', 'w+');
    $update_films_number_do = fwrite($update_films_number, ($file_count_read + 1));
    fclose($update_films_number);

    header('Location: listing.php');
   
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Films Marvels</title>
</head>
<body>
    <div class="container">
        <h3>Création d'un fichier</h3>
        <form action="" method="post">
            <label>Titre</label>
            <input type="text" name="titre" class="form-control">
            <hr/>
            <label>Année de sortie</label>
            <input type="text" name="sortie" class="form-control">
            <label>Image</label>
            <input type="url" name="url" class="form-control">
            <br/>
            <input type="submit" value="Envoyer" class="btn btn-success">
        </form>
    </div>
</body>
</html>