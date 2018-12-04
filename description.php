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

echo $movies['titre'];

?>

<?php require_once('includes/footer.php'); ?>