<?php
$opendir = opendir('./resources/movies');
require_once('includes/header.php'); 

?>


<div class="container page-content">
    <h3> Suppression d'un fichier</h3>
         <form method = "post">
            <label>Titre</label>
            <select class="custom-select">
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

<?php require_once('includes/footer.php'); ?>