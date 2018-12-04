<?php

require_once('includes/header.php');

$file = file_get_contents('./resources/movies/'.$_GET['film']);
$separator = '<#-#>';
$file_line = explode("\r", $file);

$movies = [];

foreach($file_line as $line) {
    $file_line_content = explode($separator, $line);
    $movies[$file_line_content[0]] = $file_line_content[1];
}

?>
<div class=page-content>
    <div class="d-flex justify-content-around">
        <div>
            <img src="<?php echo $movies['url'] ?>"/>
        </div>
        <div>
            <h3 class="title"><?php echo $movies['titre'] ?></h3>
            <h4>Date de sortie : <?php echo $movies['sortie'] ?></h4>
        </div>
    </div>
</div>

<?php require_once('includes/footer.php'); ?>