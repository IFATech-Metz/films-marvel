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
fclose($file)
?>
<div class=page-content>
    <div class="d-flex justify-content-between">
        <div class="description-picture">
            <img src="<?php echo $movies['url']; ?>"/>
        </div>
        <div class="description-text d-flex flex-column justify-content-between">
            <div class="movie-infos">
                <h3><?php echo $movies['titre']; ?></h3>
                <h4>Date de sortie : <?php echo $movies['sortie']; ?></h4>
                <p><?php echo $movies['summary']; ?></p>
            </div>
            <div class="movie-link">
                <button id="trailer-video-trigger" class="btn btn-youtube btn-lg" data-toggle="modal" data-target=".trailer-modal"><strong><i class="fab fa-youtube"></i> Voir la Bande-Annonce</strong></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade trailer-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width:70%;height:90%;">
        <div class="modal-content" id="trailer-video" style="height: 100%"></div>
    </div>
</div>

<?php require_once('includes/footer.php'); ?>

<script>
    $('#trailer-video-trigger').click(function() {
        $('#trailer-video').html('<iframe src="https://www.youtube.com/embed/b-kTeJhHOhc?autoplay=1&showinfo=0&modestbranding=1&controls=0" frameborder="0" allowfullscreen style="height: 100%"></iframe>')
    });
</script>