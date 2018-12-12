<?php

require_once('includes/header.php');

$separator = '<#-#>';
$file = fopen('./resources/movies/'.$_GET['film'], "r");
$movies = [];

while(!feof($file)) {
    $file_line = fgets($file);
    $file_line_content = explode($separator, $file_line);
    $movies[$file_line_content[0]] = $file_line_content[1];
}
fclose($file);

$movies['id'] = str_replace("\r\n", "", $movies['id']);

if($_POST && $_GET['film']) {
    $titre = $_POST['titre'];
    $sortie = $_POST['sortie'];
    $categorie = $_POST['categorie'];
    $url = $_POST['url'];
    $summary = $_POST['summary'];
    $summary = str_replace("\r\n", "", $summary);
    $separator = '<#-#>';

    $standard_titre = strtolower($titre);
    $standard_titre = str_replace(' ', '-', $standard_titre);
    $standard_titre = str_replace(':', '', $standard_titre);
    
    $file_id = "id".$separator.str_pad(($movies['id']), 5, '0', STR_PAD_LEFT);
    $file_date = "date".$separator.date('d/m/Y - H:i:s');
    $file_title = "titre".$separator.$titre;
    $file_sortie = "sortie".$separator. $sortie;
    $file_categorie = "categorie".$separator.$categorie;
    $file_url = "url".$separator.$url;
    $file_summary = "summary".$separator.$summary;

    $write_film = fopen('./resources/movies/' . $_GET['film'], 'w+');
    $write_film_do = fwrite($write_film,$file_id."\r\n".$file_date . "\r\n" .$file_title."\r\n". $file_sortie ."\r\n".$file_url."\r\n".$file_summary."\r\n".$file_categorie);
    fclose($write_film);

    header('Location: index.php?edit=true');
}

?>

<div class="container page-content">
    <h3>Modification d'un film</h3>
    <form method="post">
        <div class="row">
            <div class="col-md-6">
                <label>Titre</label>
                <input type="text" name="titre" value="<?= $movies['titre']; ?>" class="form-control m-b-20">
            </div>
            <div class="col-md-6">
                <label>Année de sortie</label>
                <input type="text" name="sortie" value="<?= $movies['sortie']; ?>" class="form-control m-b-20">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Catégorie</label>
                <input type="text" name="categorie" value="<?= $movies['categorie']; ?>" class="form-control m-b-20">
            </div>
            <div class="col-md-6">
                <label>Image</label>
                <input type="url" name="url" value="<?= $movies['url']; ?>" class="form-control m-b-20">
            </div>
        </div>
        <label>Résumé</label>
        <textarea class="form-control m-b-20" name="summary" rows="6"><?= $movies['summary']; ?></textarea>
        <input type="submit" value="Envoyer" class="btn btn-success">
    </form>
</div>

<?php require_once('includes/footer.php'); ?>