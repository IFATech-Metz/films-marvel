<div class="row">
    <?php
        $opendir = opendir('../movies');
        $movieData = [];
        while ($entry = readdir($opendir)) {
            if ($entry !== '.' && $entry !== '..') {
                $fileContent = file_get_contents('../movies/' . $entry);
                $separator = '<#-#>';
                $array = explode("\r\n", $fileContent);
                $subTab = [];                
                foreach ($array as $lineContent) {
                    $line = explode($separator, $lineContent);
                    $subTab[$line[0]] = $line[1];
                }
                $movieData[$entry] = $subTab;
                ksort($movieData);

                $excluded = [
                    "categorie"
                ];

                $movie = $movieData[$entry];
                ?>
                <div class="col-md-3">
                    <div class="movie-item" style="background: url(<?= $movie['url']; ?>);background-size: cover;">
                        <span class="backdrop animated fadeIn faster"></span>
                        <div class="item-content animated fadeIn faster">
                            <h3 class="movie-title"><?= $movie['titre'] ?></h3>
                            <p class="movie-summary">
                                <?php 
                                    echo substr($movie['summary'], 0, 200)."...";
                                ?>
                            </p>
                            <span class="movie-date">Date de sortie: 2008</span>
                            <a href="/description.php?film=<?= $entry; ?>" class="movie-link m-t-20 d-block ml-auto mr-auto">
                                <i class="fas fa-search-plus fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php }
        }
    ?>
</div>