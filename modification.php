<?php
$opendir = opendir('./resources/movies');
require_once('includes/header.php');

if($_POST) {
    $fileToModify = $_POST['entry'];
    header('Location: ?modify='.$fileToModify);
}

?>

<?php
if($_GET && $_GET['modify'] == true) {
    $file = file_get_contents('./resources/movies/'.$_GET['modify']);
    $separator = '<#-#>';
    $file_line = explode("\r\n", $file);

    $movies = [];

    foreach($file_line as $line) {
        $file_line_content = explode($separator, $line);
        $movies[$file_line_content[0]] = $file_line_content[1];
    } ?>

    <div class="container page-content">
    <h3>Modification d'un film</h3>
    <form method="post">
        <label>Titre</label>
        <input type="text" name="titre" class="form-control m-b-20" value="<?php echo $movies['titre']; ?>">
        <label>Année de sortie</label>
        <input type="text" name="sortie" class="form-control m-b-20" value="<?php echo $movies['sortie']; ?>">
        <label>Catégories</label>
        <input type="text" name="categorie" class="form-control m-b-20" value="<?php echo $movies['categorie']; ?>">
        <label>Image</label>
        <input type="url" name="url" class="form-control m-b-20" value="<?php echo $movies['url']; ?>">
        <label> Résumé</label>
        <textarea class="form-control m-b-20" name="summary" rows="6" value="<?php echo $movies['summary']; ?>"></textarea>
        <input type="submit" value="Envoyer" class="btn btn-success">
    </form>
</div>

<?php } else { ?>

<div class="container page-content">
    <h3>Modification d'un fichier</h3>
    <form method="POST">
        <label>Titre</label>
        <select name="entry" class="custom-select m-b-20">
            <option selected disabled>Choisissez votre film</option>
            <?php
                while ($entry = readdir($opendir)) {
                    if ($entry !== '.' && $entry !== '..') {
                        $beautifyEntry = str_replace('-', ' ', $entry);
                        $beautifyEntry = str_replace('.txt', '', $beautifyEntry);
                        $beautifyEntry = ucwords($beautifyEntry);
                        echo '<option value="'. $entry .'">'. $beautifyEntry .'</option>';
                    }
                }
            ?>
        </select>
        <input type="submit" value="Envoyer" class="btn btn-success">
    </form> 
</div>

<?php } ?>

<?php require_once('includes/footer.php'); ?>