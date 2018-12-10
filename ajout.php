<?php

require_once('includes/header.php');

if($_POST) {
    $titre = $_POST['titre'];
    $sortie = $_POST['sortie'];
    $categorie = $_POST['categorie'];
    $url = $_POST['url'];
    $summary = $_POST['summary'];
    $separator = '<#-#>';

    $file_count = fopen('./resources/filecount.txt', 'r');
    $file_count_read = fgets($file_count);
    fclose($file_count);

    $standard_titre = strtolower($titre);
    $standard_titre = str_replace(' ', '-', $standard_titre);
    $standard_titre = str_replace(':', '', $standard_titre);
    
    $file_id = 'id'.$separator.str_pad(($file_count_read + 1), 5, '0', STR_PAD_LEFT);
    $file_date = 'date'.$separator.date('d/m/Y - H:i:s');
    $file_title = 'titre'.$separator.$titre;
    $file_sortie = 'sortie'.$separator. $sortie;
    $file_categorie = 'categorie'.$separator.$categorie;
    $file_url = 'url'.$separator.$url;
    $file_summary = 'summary'.$separator.$summary;

    $write_film = fopen('./resources/movies/' . $standard_titre . '.txt', 'w+');
    $write_film_do = fwrite($write_film,$file_id."\r".$file_date . "\r" .$file_title."\r". $file_sortie ."\r".$file_url."\r".$file_summary."\r".$file_categorie);
    fclose($write_film);

    $update_films_number = fopen('./resources/filecount.txt', 'w+');
    $update_films_number_do = fwrite($update_films_number, ($file_count_read + 1));
    fclose($update_films_number);

    header('Location: /');
   
}

?>

<div class="container page-content">
    <h3>Ajout d'un film</h3>
    <form method="post">
        <label>Titre</label>
        <input type="text" name="titre" class="form-control m-b-20">
        <label>Année de sortie</label>
        <input type="text" name="sortie" class="form-control m-b-20">
        <label>Catégories</label>
        <input type="text" name="catégorie" class="forme-control m-b-20">
        <label>Image</label>
        <input type="url" name="url" class="form-control m-b-20">
        <label> Résumé</label>
        <textarea class="form-control m-b-20" name="summary" rows="6"></textarea>
        <input type="submit" value="Envoyer" class="btn btn-success">
    </form>
</div>

<?php require_once('includes/footer.php'); ?>