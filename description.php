<?php
    // include('./includes/header_description.php');
?>

        <?php
        $file = file_get_contents('./films/'.$_GET['film']);
        $separator = '<#-#>';
        $file_line = explode("\r", $file);

        foreach($file_line as $line) {

            $file_line_content = explode($separator, $line);
            
            if(filter_var($file_line_content[1], FILTER_VALIDATE_URL)) {
                echo "<img src=".$file_line_content[1]." style=width:auto;height:250px;>";
            } else {
                echo $file_line_content[1]."<br/>";
            }
        }
        ?>

<?php
    // include('./includes/footer_description.php');
?>