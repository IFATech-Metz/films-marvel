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
                ksort($movieData);

                $excluded = [
                    "summary", "categorie"
                ];

                echo '<tr class="clickable-row" data-href="description.php?film='. $entry .'">';
                foreach ($movieData[$entry] as $key => $value) {
                    if(!in_array($key, $excluded)) {
                        if(filter_var($value, FILTER_VALIDATE_URL) || substr($value, 0, 10) === "data:image") {
                            echo '<td class="img"><img src="'.$value.'"></td>';
                        } else {
                            echo '<td>'.$value.'</td>';
                        }
                    }
                }
                echo '</tr>';
            }
        }
    ?>
    </tbody>
</table>