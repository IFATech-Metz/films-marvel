<?php
function is_dir_empty($dir) {
    $handle = opendir($dir);
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            closedir($handle);
            return FALSE;
        }
    }
    closedir($handle);
    return TRUE;
}

if (!is_dir_empty('../movies')) { ?>
    <table class="table table-bordered table-marvel">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date d'ajout</th>
                <th>Titre</th>
                <th>Année de sortie</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
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
                    $excluded = [
                        "summary", "categorie"
                    ];

                    echo '<tr class="clickable-row" data-href="description.php?film='. $entry .'">';
                    foreach ($movieData[$entry] as $key => $value) {
                        if(!in_array($key, $excluded)) {
                            if(filter_var($value, FILTER_VALIDATE_URL) || substr($value, 0, 10) === "data:image") {
                                echo '<td class="img"><img src="'.$value.'"></td>';
                            } else {
                                if($key === "id") {
                                    echo '
                                    <td>
                                        '.$value.'
                                        <div class="action-table d-flex justify-content-around align-items-center m-t-20">
                                            <a href="modification.php?film='.$entry.'" class="movie-edit"><i class="fas fa-pencil-alt fa-lg"></i></a>
                                            <a href="suppression.php?direct=true&film='.$entry.'" class="movie-delete"><i class="fas fa-trash-alt fa-lg"></i></a>
                                        </div>
                                    </td>';
                                } else {
                                    echo '<td>'.$value.'</td>';
                                }
                            }
                        }
                    }
                    echo '</tr>';
                }
            }
        ?>
        </tbody>
    </table>
<?php } else { ?>
    <div class="alert alert-danger text-center">
        Le dossier <code><?= $_SERVER['DOCUMENT_ROOT']."/resources/movies"; ?></code> est vide.
    </div>
<?php } ?>