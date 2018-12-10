<?php

require_once('includes/header.php');

// $file = file_get_contents('./resources/movies/'.$_GET['film']);
// $separator = '<#-#>';

// $movies = [];

// foreach($file_line as $line) {
//     $file_line_content = explode($separator, $line);
//     $movies[$file_line_content[0]] = $file_line_content[1];
// }

$separator = '<#-#>';
$file = fopen('./resources/movies/'.$_GET['film'], "r");
$movies = [];

while(!feof($file)) {
    $file_line = fgets($file);
    $file_line_content = explode($separator, $file_line);
    $movies[$file_line_content[0]] = $file_line_content[1];
}
fclose($file)
?>
<div class=page-content>
    <div class="d-flex justify-content-around">
        <div>
            <img src="<?php echo $movies['url']; ?>"/>
        </div>
        <div class= description-text>
            <h3 class="title"><?php echo $movies['titre']; ?></h3>
            <h4>Date de sortie : <?php echo $movies['sortie']; ?></h4>
            <p><?php echo $movies['summary']; ?></p>
        </div>
    </div>
</div>

<?php require_once('includes/footer.php'); ?>